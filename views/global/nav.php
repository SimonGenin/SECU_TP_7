<?php defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE'); ?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="/">DS-1 Platform</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo $global_route == "home" ? "active" : ""?>">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown <?php echo $global_route == "planet" ? "active" : ""?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Planet
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?page=planet&action=index">Planets</a>
          <a class="dropdown-item" href="index.php?page=planet&action=add">Add New Planet</a>
        </div>
      </li>
      <li class="nav-item dropdown <?php echo $global_route == "user" ? "active" : ""?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?page=user&action=add">Add New User</a>
          <a class="dropdown-item" href="index.php?page=user&action=index">List of users</a>
          <a class="dropdown-item" href="index.php?page=user&action=password">Change Password</a>
          <a class="dropdown-item" href="index.php?page=auth&action=logout">Logout</a>
        </div>
      </li>
    </ul>
    <form class="form-inline mt-2 mt-md-0" method="POST" action="index.php?page=planet&action=search">
      <input class="form-control mr-sm-2" type="text" name="name" placeholder="Search for planet" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>