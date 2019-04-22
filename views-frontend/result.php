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
      <p><?php echo $result ?></p>

      <h2 style="text-align: center;">Search Result</h2>
      <div><?php echo Message();  
              echo SuccessMessage();
          ?>
        </div>

    <span class="" style="margin-left: 74%;">Haven't register yet? GoTo <a href="index4.php">Register</a></span>


     <pre> 
      <?php
      echo $result = json_decode($result) ?>
</pre>

<!-- /*fetching all existing user details*/ -->







<!-- /*fetching all existing user details*/ -->
<div class="row">
          <div class="col-md-12">
            <?php $result = json_decode($result) ?>
            <?php if(!empty($result)) { ?>
              <table class="table">
                <tr>
                  <th>Username</th>
                  <th>EmailID</th>
                  <th>Phone Number</th>
                  <th>Creation Time</th>
                  <th>Action</th>
                </tr>
                <?php foreach($result as $result) { ?>
                  <tr>
                    <td><?php echo $result->userName ?></td>
                    <td><?php echo $result->emailId ?></td>
                    <td><?php echo $result->phoneNo ?></td>
                    <td><?php echo $result->dateTime ?></td>
                    <td>
                      <a href="update.php?emailId=<?php echo $result->emailId?>&action=edit" class="btn btn-info btn-md">Search</a> 
                      
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
