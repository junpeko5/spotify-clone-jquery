<?php
include("../../config.php");
if (isset($_POST['songId'])) {
  $songId = $_POST['songId'];
  $sql = "SELECT * FROM songs WHERE id = '$songId'";
  $query = mysqli_query($con, $sql);
  $resultArray = mysqli_fetch_array($query);
  echo json_encode($resultArray);
}
