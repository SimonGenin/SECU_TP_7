<?php
defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');
require_once 'views/global/header.php';
require_once 'views/global/nav.php';
?>
<main role="main" class="container">
    <h3>Users <small class="text-muted">Profiles</small></h3>

    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Avatar</th>
                <th scope="col">Username</th>
                <th scope="col">Permission</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                <tr>
                <th scope="row"><?php echo $row["id"]?></th>
                <td><img src="<?php echo $row["photo_path"]?>" width=50 class="rounded float-left"/></td>
                <td><?php echo $row["username"]?></td>
                <td><?php echo $row["permission"]?></td>
                <td><a class="btn btn-sm btn-danger" href="index.php?page=user&action=delete&userId=<?php echo $row["id"]?>" role="button">Delete</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
        <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="index.php?page=user&action=index&pageno=<?php echo $previous ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="index.php?page=user&action=index&pageno=<?php echo $next ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
            </a>
        </li>
        </ul>
    </nav>
    </div>
</main>
<?php require_once 'views/global/footer.php'; ?>