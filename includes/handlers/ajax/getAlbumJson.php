<?php
include("../../config.php");
if (isset($_POST['albumId'])) {
  $albumId = $_POST['albumId'];
  $sql = "SELECT * FROM albums WHERE id = '$albumId'";
  $query = mysqli_query($con, $sql);
  $resultArray = mysqli_fetch_array($query);
  echo json_encode($resultArray);
}
