<?php
  defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');
  require_once 'views/global/header.php';
  require_once 'views/global/nav.php';
?>
<main role="main" class="container">
    <h3>Add New User</h3>
    <form method="POST" action="index.php?page=user&action=save">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputUsername" class="sr-only">Username</label>
                    <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Userame" required>
                </div>

                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="inputNewPassword2" class="sr-only">Permission</label>
                    <select class="form-control" id="status" name="permission">
                        <?php 
                        foreach (USER_PERMISSIONS as $key => $value):
                        echo "<option value=\"$key\">$value</option>\n";
                        endforeach;
                        ?>
                    </select>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </div>
        </div>
    </form>
</main>
<?php require_once 'views/global/footer.php'; ?>