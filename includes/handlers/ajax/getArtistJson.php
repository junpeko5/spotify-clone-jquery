<?php
include("../../config.php");
if (isset($_POST['artistId'])) {
  $artistId = $_POST['artistId'];
  $sql = "SELECT * FROM artists WHERE id = '$artistId'";
  $query = mysqli_query($con, $sql);
  $resultArray = mysqli_fetch_array($query);
  echo json_encode($resultArray);
}
