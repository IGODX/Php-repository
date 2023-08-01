<?
session_start();
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link
          <? echo $page == 1 ? "active" : "" ?>" aria-current="page" href="?page=1">Tours</a>
        </li>
        <?
        if (isset($_SESSION["role"]))
          if ($_SESSION["role"] == 2) {
        ?>
          <li class="nav-item">
            <a class="nav-link
          <? echo $page == 3 ? "active" : "" ?>" href="?page=3">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link
          <? echo $page == 7 ? "active" : "" ?>" href="?page=7">Private</a>
          </li>
        <?
          }
        ?>
        <?
        if (!isset($_SESSION["login"])) {
        ?>
          <li class="nav-item">
            <a class="nav-link
          <? echo $page == 4 ? "active" : "" ?>" href="?page=4">Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link
          <? echo $page == 5 ? "active" : "" ?>" href="?page=5">Log in</a>
          </li>
        <?
        } else {
        ?>
          <li class="nav-item">
            <a class="nav-link
          <? echo $page == 6 ? "active" : "" ?>" href="?page=6">Log out</a>
          </li>
        <?
        }
        ?>
      </ul>
    </div>
  </div>
</nav>