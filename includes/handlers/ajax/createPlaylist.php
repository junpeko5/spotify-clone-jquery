<?php
include("../../config.php");
if(!empty($_POST['name']) && !empty($_POST['username'])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $date = date("Y-m-d");
  $sql = "
INSERT INTO
  playlists 
  (
    name,
    owner,
    dateCreated
  ) 
VALUES 
  (
   '$name', 
   '$username', 
   '$date'
  )
";
  $query = mysqli_query($con, $sql);
}
else {
  echo "Name or username parameters not passed into title";
}
