const mysql = require('mysql')


var dbcon = mysql.createConnection({
  host     : 'db-intern.ciupl0p5utwk.us-east-1.rds.amazonaws.com',
  user     : 'dummyUser',
  password : 'dummyUser01',
  database : 'db_intern',
  
});

 dbcon.connect((err) => {
  if (err){
    console.log(err)
  }
  else{
    console.log('Database successfully connected...')
  } 
})






module.exports = dbcon