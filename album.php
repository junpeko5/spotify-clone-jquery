<?php include("./includes/includedFiles.php"); ?>
<?php
if (isset($_GET['id'])) {
  $albumId = $_GET['id'];
}
else {
  header("Location: index.php");
}
$album = new Album($con, $albumId);
$artist = $album->getArtist();
?>
<div class="entityInfo">
  <div class="leftSection">
    <img src="<?php echo $album->getArtworkPath(); ?>" alt="">
  </div>
  <div class="rightSection">
    <h2><?php echo $album->getTitle(); ?></h2>
    <p>By <?php echo $artist->getName(); ?></p>
    <p><?php echo $album->getNumberOfSongs(); ?></p>
  </div>
</div>
<div class="trackListContainer">
  <ul class="trackList">
    <?php
    $songIdArray = $album->getSongIds();
    $i = 1;
    foreach($songIdArray as $songId) {
      $albumSong = new Song($con, $songId);
      $album_artist = $albumSong->getArtist();
      echo "<li class='trackListRow'>
              <div class='trackCount'>
                <img class='play' src='assets/images/icons/play-white.png' alt='PlayWhite' onclick='setTrack(\"" .$albumSong->getId() . "\", tempPlaylist, true)'>
                <span class='trackNumber'>$i</span>
              </div>
              <div class='trackInfo'>
                <span class='trackName'>" . $albumSong->getTitle() . "</span>
                <span class='artistName'>" . $album_artist->getName() . "</span>
              </div>
              <div class='trackOptions'>
                <img class='optionsButton' src='assets/images/icons/more.png' alt='more'>
              </div>
              <div class='trackDuration'>
                <span class='duration'>" . $albumSong->getDuration() . "</span>
              </div>
            </li>";
      $i++;
    }
    ?>
    <script>
      var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
      tempPlaylist = JSON.parse(tempSongIds);
    </script>
  </ul>
</div>
