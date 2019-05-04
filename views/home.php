<?php
defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');
require_once 'views/global/header.php';
require_once 'views/global/nav.php';
?>
<main role="main" class="container">
  <?php echo alert(); ?>
  <div class="jumbotron">
    <h1>Death Star Status</h1><span class="badge badge-primary">80% charged</span>
    <span class="badge badge-secondary">Moving</span>
    <span class="badge badge-success">Target set</span>
    <p class="lead">DS-1 Platform</p>
  </div>

  <h3>Planet Destructions <small class="text-muted">Activities</small></h3>

  <div class="table-responsive">
    <table class="table table-dark">
      <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Destruction Date</th>
            <th scope="col">Status</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($results as $row): ?>
        <tr>
            <th scope="row"><?php echo $row["id"]?></th>
            <td><?php echo $row["name"]?></td>
            <td><?php echo $row["date"]?></td>
            <td><?php echo strStatus($row["status"]);?></td>
            <td><?php echo $row["description"]?></td>
            <td><a class="btn btn-sm btn-danger" href="index.php?page=navigation&action=set&planetId=<?php echo $row["id"]?>" role="button">Set Target</a></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="index.php?page=home&pageno=<?php echo $previous ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="index.php?page=home&pageno=<?php echo $next ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
            </a>
        </li>
        </ul>
    </nav>
  </div>
</main>
<?php require_once 'views/global/footer.php'; ?>