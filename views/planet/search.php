<?php
defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');
require_once 'views/global/header.php';
require_once 'views/global/nav.php';
?>
<main role="main" class="container">
    <h3>Planet <small class="text-muted">results</small></h3>
    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Region</th>
                <th scope="col">Sector</th>
                <th scope="col">System</th>
                <th scope="col">Inhabitant</th>
                <th scope="col">City</th>
                <th scope="col">Action</th>
                <th scope="col">Target</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                <tr>
                    <th scope="row"><?php echo $row["id"]?></th>
                    <td><?php echo $row["name"]?></td>
                    <td><?php echo $row["region"]?></td>
                    <td><?php echo strSector($row["sector"]);?></td>
                    <td><?php echo strSystem($row["system"]);?></td>
                    <td><?php echo strInhabitant($row["inhabitant"]);?></td>
                    <td><?php echo strCity($row["city"]);?></td>
                    <td><a class="btn btn-sm btn-primary" href="index.php?page=planet&action=update&planetId=<?php echo $row["id"]?>" role="button">Update</a></td>
                    <td><a class="btn btn-sm btn-danger" href="index.php?page=navigation&action=set&planetId=<?php echo $row["id"]?>" role="button">Set Target</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="index.php?page=planet&action=<?php echo $action ?>&name=<?php echo $name?>&pageno=<?php echo $previous ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="index.php?page=planet&action=<?php echo $action ?>&name=<?php echo $name?>&pageno=<?php echo $next ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
            </a>
        </li>
        </ul>
    </nav>
</main>
<?php require_once 'views/global/footer.php'; ?>