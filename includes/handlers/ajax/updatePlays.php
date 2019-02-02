<?php
include("../../config.php");
if (isset($_POST['songId'])) {
  $songId = $_POST['songId'];
  $sql = "UPDATE songs SET plays = plays + 1 WHERE id = '$songId'";
  $query = mysqli_query($con, $sql);
}
