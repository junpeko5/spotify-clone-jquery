<div id="navBarContainer">
  <nav class="navBar">
    <span class="logo" role="link" tabindex="0" onclick="openPage('index.php');">
      <img src="./assets/images/icons/icons8-doge.png" alt="">
    </span>
    <div class="group">
      <div class="navItem">
        <span role="link" tabindex="0" onclick="openPage('search.php');" class="navItemLink">
          Search
          <img src="./assets/images/icons/search.png" alt="Search" class="icon">
        </span>
      </div>
    </div>
    <div class="group">
      <div class="navItem">
      <span class="logo" role="link" tabindex="0" onclick="openPage('browse.php');" class="navItemLink">
          Browse
        </span>
      </div>
      <div class="navItem">
      <span class="logo" role="link" tabindex="0" onclick="openPage('yourMusic.php');" class="navItemLink">
          Your Music
        </span>
      </div>
      <div class="navItem">
        <span class="logo"
              role="link"
              tabindex="0"
              onclick="openPage('setting.php');"
              class="navItemLink">
          <?php echo $username ?>
        </span>
      </div>
    </div>
  </nav>
</div>
