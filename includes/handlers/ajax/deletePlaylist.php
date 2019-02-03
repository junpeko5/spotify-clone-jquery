<?php
include("../../config.php");
if (isset($_POST['playlistId'])) {
  $playlistId = $_POST['playlistId'];
  $playlistSql = "DELETE FROM playlists WHERE id = '$playlistId'";
  $playlistQuery = mysqli_query($con, $playlistSql);

  $playlistSongsSql = "DELETE FROM playlistSongs WHERE playlistId = '$playlistId'";
  $playlistSongsQuery = mysqli_query($con, $playlistSongsSql);
}
else {
  echo "PlaylistId was not passed into deletePlaylist.php";
}
?>
