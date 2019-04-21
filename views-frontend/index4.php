<?php
  require_once('api-call.php');
?>






<!DOCTYPE html>
<html>
  <head>
    <title>Coral Blockchain</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>


<body style="padding: 18px">




  <h1 style="text-align: center;padding-top: 40px">Coral Blockchain</h1>
  <p><?php echo $result ?></p>

<!-- to search user data -->

<br>
<div class="offset-3 col-sm-6">
  <form action="" method="POST">
    <div class="form-row">
      <div class="col-md-9">


        <input type="email" name="emailId" class="form-control" />
      </div>
      <div class="col-sm-3">
        <input type="hidden" name="emailId" value="<?php echo $userdata->emailid ?>">
        <button type="submit" name="searchbtn" value="search" class="btn btn-warning">Search</button>
      </div>
    </div>

  </form>
  <br>
  <hr>

</div>

<br>

  <div class="offset-3 col-sm-6" style="background-color: #ffffff;margin-top: 2%">
    <form action="" method="POST">
      <fieldset>
        <legend>Add New User</legend>
        <div class="form-group">

          <div>
            <label><span class="fields">Username: </span></label>
            <div class="input-group ">
              <input class="form-control" type="text" name="userName" id="username" placeholder="Enter Username" required="Username is required">
            </div><br>
          </div>


          <div>
            <label><span class="fields">EmailID: </span></label>
            <div class="input-group">
              <input class="form-control" type="email" name="emailId" id="email" placeholder="Enter Email" required >
            </div><br>
          </div>




          <div>
            <label><span class="fields">Phone No.: </span></label>
            <div class="input-group">
              <input class="form-control" type="number" name="phoneNo" id="phone" pattern="[0]{1}[0-9]{9}" placeholder="Enter Phone Number" required maxlength="10">
            </div><br>
          </div>






          <div>
            <label><span class="fields">Password: </span></label>
            <div class="input-group">
              <input class="form-control" type="password" name="password" id="password" placeholder="Type Password" required>
            </div><br>
          </div>

        </div>


        <button class="btn btn-primary btn-block" type="submit" name="submit" value="create">Register</button><br>
      </fieldset>
    </form>
  </div>










</div>
</body>

</html>