<?php
  require_once('api-call.php');
  require_once('sessions.php');
?>






<!DOCTYPE html>
<html>
  <head>
    <title>Coral Blockchain</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>


<body style="padding: 20px">
<!-- /*fetching all existing user details*/ -->

  <h1 style="text-align: center;padding-top: 40px">Coral Blockchain</h1>
  <p><?php echo $result ?></p>




<span class="" style="margin-left: 64%;">Haven't register yet? GoTo <a href="index4.php">Register</a></span>

  <!-- update users -->

  <div class="offset-4 col-sm-6" style="background-color: #ffffff;margin-top: 2%">
    <?php if(isset($_GET['action']) && $_GET['action'] == 'edit') { ?>
    <form action="" method="POST">
      <fieldset>
        <legend>Add New User</legend>
        <div class="form-group">

          <div>
            <label><span class="fields">Username: </span></label>
            <div class="input-group ">
              <input class="form-control" type="text" name="userName" id="username" placeholder="Enter Username" required  value="<?php echo $userdata->userName ?>">
            </div><br>
          </div>


          <div>
            <label><span class="fields">EmailID: </span></label>
            <div class="input-group">
              <input class="form-control" type="email" name="emailId" id="email" placeholder="Enter Email" required  value="<?php echo $userdata->emailId ?>">
            </div><br>
          </div>




          <div>
            <label><span class="fields">Phone No.: </span></label>
            <div class="input-group">
              <input class="form-control" type="number" name="phoneNo" id="phone" pattern="[0]{1}[0-9]{9}" placeholder="Enter Phone Number" required maxlength="10"  value="<?php echo $userdata->phoneNo ?>">
            </div><br>
          </div>






          <div>
            <label><span class="fields">Password: </span></label>
            <div class="input-group">
              <input class="form-control" type="password" name="password" id="password" placeholder="Type Password" required  value="<?php echo $userdata->password ?>">
            </div><br>
          </div>

        </div>

        <div>
        <input type="hidden" name="emailId" value="<?php echo $userdata->emailId ?>" />
        <button class="btn btn-primary btn-block" type="submit" name="submit" value="update">Update</button><br>
      </div>
      </fieldset>
    </form>
    <?php }?>
  </div>

</div>
</body>

</html>