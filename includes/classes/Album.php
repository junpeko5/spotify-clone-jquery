<?php
class Album {
  private $con;
  private $id;
  private $title;
  private $artist;
  private $genre;
  private $artworkPath;

  public function __construct($con, $id)
  {
    $this->con = $con;
    $this->id = $id;
    $sql = "SELECT * FROM albums WHERE id='$this->id'";
    $query = mysqli_query($this->con, $sql);
    $album = mysqli_fetch_array($query);
    $this->title = $album['title'];
    $this->artist = $album['artist'];
    $this->genre = $album['genre'];
    $this->artworkPath = $album['artworkPath'];
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getArtist()
  {
    return new Artist($this->con, $this->artist);
  }

  public function getGenre()
  {
    return $this->genre;
  }

  public function getArtworkPath()
  {
    return $this->artworkPath;
  }

  public function getNumberOfSongs() {
    $sql = "SELECT id FROM songs WHERE album = '$this->id'";
    $query = mysqli_query($this->con, $sql);
    return mysqli_num_rows($query);
  }

  public function getSongIds()
  {
    $sql = "SELECT id FROM songs WHERE album = '$this->id' ORDER BY albumOrder ASC";
    $query = mysqli_query($this->con, $sql);
    $array = [];
    while($row = mysqli_fetch_array($query)) {
      array_push($array, $row['id']);
    }
    return $array;
  }
}
