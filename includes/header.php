<!DOCTYPE html>
<html lang="ja">
<head>a
  <meta charset="utf-8">
  <title>Welcome to Spotify</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/js/script.js"></script>
  <?php
  if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
    $username = $userLoggedIn->getUsername();
    echo "<script>userLoggedIn = '$username'</script>";
  } else {
    header("Location: register.php");
  }
  ?>
</head>
<body>
<div id="mainContainer">
  <div id="topContainer">
    <?php include("includes/navBarContainer.php"); ?>
    <div id="mainViewContainer">
      <div id="mainContent">
