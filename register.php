<?php
$errors = [];

if (isset($_POST['submit'])) {
  // retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm-password'];

  // validate name
  if (empty($name)) {
    $errors[] = "Name is required";
  } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
    $errors[] = "Only letters and white space allowed for name";
  }

  // validate email
  if (empty($email)) {
    $errors[] = "Email is required";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
  } else if (strpos($email, 'gmail.com') === false) {
    $errors[] = "Only Gmail email addresses are allowed";
  }

  // validate phone
  if (empty($phone)) {
    $errors[] = "Phone is required";
  } else if (!preg_match("/^[0-9]*$/", $phone)) {
    $errors[] = "Only numbers allowed for phone";
  } else if (strlen($phone) != 10) {
    $errors[] = "Phone number must be 10 digits";
  }

  // validate address
  if (empty($address)) {
    $errors[] = "Address is required";
  }
  
   // validate password
   if (empty($password)) {
    $errors[] = "Password is required";
  } else if (strlen($password) < 8) {
    $errors[] = "Password must be at least 8 characters long";
  }
  // Check if reenter password is empty
if (empty($confirm_password)) {
    $errors[] = "Please re-enter your password";
  } else if ($confirm_password !== $password) {
    $errors[] = "Passwords do not match";
  }


  // if no errors, redirect to success page
  if (empty($errors)) {
    header("Location: success.php");
    exit();
  }
}
?>
