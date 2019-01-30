<?php
class Artist {
  private $con;
  private $id;
  private $artist;

  public function __construct($con, $id)
  {
    $this->con = $con;
    $this->id = $id;
    $sql = "SELECT name FROM artists WHERE id='$this->id'";
    $query = mysqli_query($this->con, $sql);
    $artist = mysqli_fetch_array($query);
    $this->artist = $artist['name'];
  }

  public function getName()
  {
    return $this->artist;
  }
}
