<?php
include("../../config.php");
if (empty($_POST['username'])) {
  echo "ERROR: Could not set username";
  exit;
}
if (isset($_POST['email']) && $_POST['email'] !== "") {
  $username = $_POST['username'];
  $email = $_POST['email'];

  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email is invalid";
    exit;
  }

  $sql = "SELECT email FROM users WHERE email = '$email' AND username != '$username'";
  $emailCheck = mysqli_query($con, $sql);
  if (mysqli_num_rows($emailCheck) > 0 ) {
    echo "Email is already in use";
    exit;
  }

  $updateSQL = "UPDATE users SET email = '$email' WHERE username = '$username'";
  $updateQuery = mysqli_query($con, $updateSQL);
  echo "Update Successful";
  exit;
}
else {
  echo "ERROR: You must provide an email.";
  exit;
}
