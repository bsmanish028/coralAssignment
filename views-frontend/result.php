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
  <body>
    <div class="container" style="margin-top: 30px;">
      <h1>Coral Blockchain</h1>
      <br>
      <p><?php echo $userdatas ?></p>

      <h2 style="text-align: center;">Search Result</h2>
      <div><?php echo Message();  
              echo SuccessMessage();
          ?>
        </div>

    <span class="" style="margin-left: 74%;">Haven't register yet? GoTo <a href="index4.php">Register</a></span>


     <!-- <pre> 
      <?php
      echo $result = json_decode($result) ?>
     </pre> -->

<!-- /*fetching all existing user details*/ -->



<?php echo $userdatas;?>



<!-- /*fetching all existing user details*/ -->
<div class="row">
          <div class="col-md-12">

            
            <?php if(!empty($userdatas)) { 
               ?>
               <?php echo "HelloGK"; ?>
              <table class="table">
                <tr>
                  <th>Username</th>
                  <th>EmailID</th>
                  <th>Phone Number</th>
                  <th>Creation Time</th>
                  <th>Action</th>
                </tr>
                <?php foreach($userdatas as $userdatas) { ?>
                  <tr>
                    <td><?php echo $userdatas->userName ?></td>
                    <td><?php echo $userdatas->emailId ?></td>
                    <td><?php echo $userdatas->phoneNo ?></td>
                    <td><?php echo $userdatas->dateTime ?></td>
                    <td>
                      <a href="update.php?emailId=<?php echo $result->emailId?>&action=edit" class="btn btn-info btn-md">Search</a>
                      <a href="result.php?emailId=<?php echo $result->emailId?>&action=delete" class="btn btn-info btn-md">Delete</a> 
                      
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
