<?php
  defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');
  require_once 'views/global/header.php';
  require_once 'views/global/nav.php';
?>
<main role="main" class="container">
    <h3>Change User Password</h3>
    <form enctype="multipart/form-data" method="POST" action="index.php?page=user&action=update">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputNewPassword1" class="sr-only">Enter New Password</label>
                    <input type="password" id="inputNewPassword1" name="newPassword1" class="form-control" placeholder="New Password" required>
                </div>
                <div class="form-group">
                    <label for="inputNewPassword2" class="sr-only">Enter New Password Again</label>
                    <input type="password" id="inputNewPassword2" name="newPassword2" class="form-control" placeholder="New Password Again" required>
                </div>
                <div class="form-group">
                    <input type="file" name="photo" class="form-control">
                </div>
                <input type="hidden" name="userId" value="<?php echo $_SESSION["global_id"]; ?>"/>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
            </div>
        </div>
    </form>
</main>
<?php require_once 'views/global/footer.php'; ?>