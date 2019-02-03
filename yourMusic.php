<?php
include("includes/includedFiles.php");
?>
<div class="playListsContainer">
  <div class="gridViewContainer">
    <h2>PLAYLISTS</h2>
    <div class="buttonItems">
      <button class="button green" onclick="createPlaylist()">
        NEW PLAYLIST
      </button>
    </div>
  </div>
</div>
<div class="gridViewContainer">
  <h2>ALBUMS</h2>
  <?php
  $username = $userLoggedIn->getUsername();
  $playListsQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner LIKE '$username' LIMIT 10");
  if (mysqli_num_rows($playListsQuery) === 0) {
    echo "<span class='noResults'>You don\'t have any playlists yet</span>";
  }
  while($row = mysqli_fetch_array($playListsQuery)) {
    $playlist = new Playlist($con, $row);

    echo "
      <div class='gridViewItem' 
      role='link' 
      tabindex='0' 
      onclick='openPage(\"playlist.php?id=" . $playlist->getId() . "\")'>
        <div class='playlistImage'>
          <img src='assets/images/icons/playlist.png'>
        </div>
        <div class='gridViewInfo'>
        " . $playlist->getName() . "
        </div>
      </div>";
  }
  ?>
</div>
