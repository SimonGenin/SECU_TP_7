<?php
  defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');
  require_once 'global/header.php';
?>

<body class="text-center">
    <form class="form-signin" method="POST" action="index.php?page=auth&action=login">
        <img class="mb-4" src="public/img/DeathStar.jpg" alt="Death Star" width="120" height="120">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>
</body>
<?php require_once 'global/footer.php'; ?>