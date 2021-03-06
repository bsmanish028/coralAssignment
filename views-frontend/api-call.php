<?php
      require_once('sessions.php');

?>



<?php
  /*coralapi function start */
  function coralapi($method, $url, $data) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);

    if($method == 'POST') {
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    if($method == 'PUT') {
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    if($method == 'DELETE') {
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    }
    
    curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
      ));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      $output = curl_exec($ch);

    curl_close ($ch);

    return $output;
  }
  /*coralapi function end */

  $result = '';
  $userdatas = '';

  // Call GET method fetch all records
  $method = 'GET';
  $url = 'http://localhost:3000/connector';
  $data = NULL;

  $connector = coralapi($method, $url, $data);

  //Call GET method fetch single record
  if(isset($_GET['action']) && $_GET['action'] == 'edit') {

    $id = $_GET['emailId'];

    $method = 'GET';
    $url = 'http://localhost:3000/connector/'.$id;
    $data = NULL;

    $userdata = coralapi($method, $url, $data);
    $userdata = json_decode($userdata);
  }

    

  //Call DELETE method
  if(isset($_GET['action']) && $_GET['action'] == 'delete') {

    $id = $_GET['emailId'];

    $method = 'DELETE';
    $url = 'http://localhost:3000/connector/delete/'.$id;
    $data = NULL;

    $result = coralapi($method, $url, $data);

    if($result){
      $_SESSION['SuccessMessage']= "User Deleted Successfully";
      header('location: all-users.php');

    }else{
      $_SESSION['ErrorMessage']= "Something went wrong";
      header('location: all-users.php');
    }
  }
  
  if(isset($_POST['submit']))
  {
    // Call POST method to update and create
    if($_POST['submit'] == 'create')
    {
      $method = 'POST';
      $url = 'http://localhost:3000/connector/create';
      $data = json_encode($_POST);

      $result = coralapi($method, $url, $data);
      
      if($result){
        $_SESSION['SuccessMessage']= "User Created Successfully";
        header('location: all-users.php');

      }else{
        $_SESSION['ErrorMessage']= "Something went wrong";
        header('location: all-users.php');
      }
    }

    // Call PUT method
    if($_POST['submit'] == 'update')
    {
      $id = $_POST['emailId'];

      $method = 'PUT';
      $url = 'http://localhost:3000/connector/update/'.$id;
      $data = json_encode($_POST);

      $result = coralapi($method, $url, $data);

      if($result){
        $_SESSION['SuccessMessage']= "User Updated Successfully";
        header('location: all-users.php');

      }else{
        $_SESSION['ErrorMessage']= "Something went wrong";
        header('location: all-users.php');
      }
    }
  }





    if(isset($_POST['submit']))
  {
    
    // Call GET method to get searched data
    if($_POST['submit'] == 'search')
    {
      $id = $_POST['emailId'];

      $method = 'GET';
      $url = 'http://localhost:3000/connector/'.$id;
      $data = NULL;

      $userdatas = coralapi($method, $url, $data);
      $userdatas = json_decode($userdatas);

      if($userdatas){
        $_SESSION['SuccessMessage']= "User Found and User Data shown below";
        header('location: result.php');

      }else{
        $_SESSION['ErrorMessage']= "User Not Found";
        header('location: result.php');
      }
    }
  }
?>