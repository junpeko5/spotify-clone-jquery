<?php
include("../../config.php");

if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
  $playlistId = $_POST['playlistId'];
  $songId = $_POST['songId'];
  $sql = "
SELECT MAX(playlistOrder) + 1 AS playlistOrder
FROM playlistSongs
WHERE id = '$playlistId'";
  $orderIdQuery = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($orderIdQuery);
  $playlistOrder = $row['playlistOrder'];
  if (is_null($playlistOrder)) {
    $playlistOrder = 1;
  }
  $sql2 = "
INSERT INTO playlistSongs 
  (songId, playlistId, playlistOrder) 
VALUES
  ('$songId', '$playlistId', '$playlistOrder')
";
  $insertPlaylistSongsQuery = mysqli_query($con, $sql2);
}
else {
  echo "PlaylistId or songId was not passed into addToPlaylist.php";
}
