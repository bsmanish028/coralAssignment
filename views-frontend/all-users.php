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
  <body>
    <div class="container" style="margin-top: 30px;">
      <h1>Coral Blockchain</h1>
      <br>
      <p><?php echo $result ?></p>

      <h2 style="text-align: center;">User Lobby</h2>

    <span class="" style="margin-left: 74%;">Haven't register yet? GoTo <a href="index4.php">Register</a></span>

<!-- /*fetching all existing user details*/ -->
        <div class="row">
          <div class="col-md-12">
            <?php $connector = json_decode($connector) ?>
            <?php if(!empty($connector)) { ?>
              <table class="table">
                <tr>
                  <th>Username</th>
                  <th>EmailID</th>
                  <th>Phone Number</th>
                  <th>Creation Time</th>
                  <th>Action</th>
                </tr>
                <?php foreach($connector as $connector) { ?>
                  <tr>
                    <td><?php echo $connector->userName ?></td>
                    <td><?php echo $connector->emailId ?></td>
                    <td><?php echo $connector->phoneNo ?></td>
                    <td><?php echo $connector->dateTime ?></td>
                    <td>
                      <a href="update.php?id=<?php echo $connector->emailId?>&action=edit" class="btn btn-info btn-md">Edit</a> 
                      <a href="all-users.php?id=<?php echo $connector->emailId?>&action=delete" class="btn btn-danger btn-md">Delete</a>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            <?php } ?>
          </div>
        </div>
    </div>
  </body>
</html>
