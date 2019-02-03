<?php
class User {
  private $con;
  private $username;
  public function __construct($con, $username)
  {
    $this->con = $con;
    $this->username = $username;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function getEmail()
  {
    $sql = "
      SELECT
        email
      FROM users
      WHERE username = '$this->username'
    ";
    $query = mysqli_query($this->con, $sql);
    $row = mysqli_fetch_array($query);
    return $row['email'];
  }

  public function getFirstAndLastName()
  {
    $sql = "
      SELECT
        CONCAT(firstName, ' ', lastName) AS name
      FROM users
      WHERE username = '$this->username'
    ";
    $query = mysqli_query($this->con, $sql);
    $row = mysqli_fetch_array($query);
    return $row['name'];
  }
}
