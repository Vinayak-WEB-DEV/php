<?php

$username = $password = "";
$usernameErr = $passwordErr = $mainErr = "";

    if(isset($_POST["Login"])) {
  
  if (empty($_POST["txtuser"])) {
    $usernameErr = "Name is required";
  } 
   else {
    $username = test_input($_POST["txtuser"]);
     // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["txtpass"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["txtpassword"]);
     // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  $username = $_POST['txtuser']; //txtuser is the name in the form field
$password = $_POST['txtpass']; //txtpass is the name in the form field

// using stmt bind parameter here instead would be more secure
   
    $checkuser = "SELECT * FROM tbl_customer WHERE CustomerName ='$username' AND password ='$password' ";
$run = mysqli_query($connect, $checkuser);

// if there are results from database 
if (mysqli_num_rows($run)>0) {

    //set the session with the name user_name 

$_SESSION['user_name'] = $username;

// setting session start and expire times 10 minutes

 $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);

header('Location:http://lindacom.infinityfreeapp.com/books/myaccount.php?username=' .$_SESSION['user_name']);

//the header location takes the user to my homepage on successful login.  you can change this to the page you want them to go to in your website
}
else{
    $mainErr = "Username and/or password do not match! Try again!";

}

    }
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  checktheuser($data);
}




?>


















 
 




