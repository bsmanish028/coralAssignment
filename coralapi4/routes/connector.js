
var express = require('express');
var router = express.Router();
var dbcon = require('../db');

var bodyParser = require('body-parser');
const bcrypt = require('bcryptjs')
var moment = require('moment')

router.use(bodyParser.json()); // for parsing application/json
//router.use(bodyParser.urlencoded({extended: true})); // for parsing application/x-www-form-urlencoded

/* get method for fetch all users data */
router.get('/', (req, res) => {
  var sql = "SELECT * FROM userData";
  dbcon.query(sql, (err, rows, fields) => {
    if (err) {
      res.status(500).send({ error: 'Something failed!' })
    }
    res.json(rows)
  })
});

/*get method for fetch single user data*/
router.get('/:id', (req, res) => {
  var id = req.params.id;
  var sql = `SELECT * FROM userData WHERE emailId = ?`;
  dbcon.query(sql, id, (err, row, fields) => {
    if(err) {
      res.status(500).send({ error: 'Something failed!' })
    }
    res.json(row[0])
  })
});

/*post method for create product*/
// router.post('/create', (req, res) => {
//     const post = req.body;

//     const salt = bcrypt.genSaltSync(8);
//     const hpassword = bcrypt.hashSync(post.password, salt)
//     const datetime = moment(Date.now()).format('YYYY-MM-DD HH:mm:ss'); //getting current time using momentjs
//     const User = {
//         userName: post.userName,
//         emailId: post.emailId, 
//         phoneNo: post.phoneNo, 
//         password: hpassword,
//         dateTime: datetime
//       };

//   var sql = `INSERT INTO userData SET ?`;
//   dbcon.query(sql,User, (err, result) {
//     if(err) {
//       res.status(500).send({ error: 'Something failed!' })
//     }
//     res.json({'status': 'success', id: result.emailId})
//   })
// });

/*put method to update user data*/
router.put('/update/:id', (req, res) => {
  var id = req.params.id;

  const post = req.body;
  const salt = bcrypt.genSaltSync(8);
  const hpassword = bcrypt.hashSync(post.password, salt)
  const datetime = moment(Date.now()).format('YYYY-MM-DD HH:mm:ss'); //getting current time using momentjs
  const User = {
        userName: post.userName,
        emailId: post.emailId, 
        phoneNo: post.phoneNo, 
        password: hpassword,
        dateTime: datetime
      };

  var sql = `UPDATE userData SET ? WHERE emailId = ?`;
  dbcon.query(sql,[User, id], (err, result) => {
    if(err) {
      res.status(500).send({ error: 'Something failed!' })
    }
    res.json({'status': 'success'})
  })
});




/*delete method to delete user data*/
router.delete('/delete/:id', (req, res) => {
  var id = req.params.id;
  var sql = `DELETE FROM userData WHERE emailId = ?`;
  dbcon.query(sql,id, (err, result) => {
    if(err) {
      res.status(500).send({ error: 'Something failed!' })
    }
    res.json({'status': 'success, User Data Deleted!'})
  })
})


/*query to insert data into database*/
var insert = (data, callback) => {
  let sql = "INSERT into userData set ?";
  dbcon.query(sql, [data], (err, result) => {
    if(err){
      callback(err);
    }else{
      callback(null, result);
    }
  })
}

/*query to update data into database*/
var update = (id, data, callback) => {
  let sql = "update userData set ? where emailId = ?";
  dbcon.query(sql, [data, id], (err, data) => {
    if(err){
      callback(err);
    }else{
      callback(null, data);
    }
  })
}



/*insert and update method to create and update users data*/
router.post("/create", (req, res) => {
  var id = req.body.emailId;

  const post = req.body;
  const salt = bcrypt.genSaltSync(8);
    const hpassword = bcrypt.hashSync(post.password, salt) // hashing password
    const datetime = moment(Date.now()).format('YYYY-MM-DD HH:mm:ss'); //getting current time using momentjs
    const User = {
      userName: post.userName,
      emailId: post.emailId, 
      phoneNo: post.phoneNo, 
      password: hpassword,
      dateTime: datetime
    };

    try {
      insert(User, (err, data) => {
        if(err){
          if(err["errno"] == 1062)
          {
            try {
              update(id, User, (err, data) => {
                if(err){
                  console.log(err["errno"]);
                  res.status(500).send({ error: `Something failed!` })
                }else{
                  res.json({status: 'success, User Data Updated'})

                }
              })
            } catch (error) {
              res.status(500).send({ error: 'Something failed while updating!' })

            }
          }
        }else{
          res.json({status: 'success, User Data Inserted'})

        }
      })
    }   
    catch (error) {
      res.status(500).send({ error: 'Something failed while inserting!' }) 
    }
  });









module.exports = router;

