<?php
defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');
require_once 'views/global/header.php';
require_once 'views/global/nav.php';
?>
<main role="main" class="container">
    <h3>Planet Status</h3>
    <form method="POST" action="index.php?page=navigation&action=update">
        <input type="hidden" name="planetId" value="<?php echo $planet["id"]; ?>"/>
        <input type="hidden" name="destructionId" value="<?php echo $planet["destruction_id"]; ?>"/>
        <table class="table table-dark">
            <tbody>
            <tr>
                <th>#</th>
                <td><?php echo $planet["id"]; ?></td>
                </tr>
                <tr>
                <th>Name</th>
                <td><?php echo $planet["name"]; ?></td>
                </tr>
                <tr>
                <th>Region</th>
                <td><?php echo $planet["region"]; ?></td>
                </tr>
                <tr>
                <th>Sector</th>
                <td><?php echo strSector($planet["sector"]); ?></td>
                </tr>
                <tr>
                <th>System</th>
                <td><?php echo strSystem($planet["system"]); ?></td>
                </tr>
                <tr>
                <th>Inhabitant</th>
                <td><?php echo strInhabitant($planet["inhabitant"]); ?></td>
                </tr>
                <tr>
                <th>City</th>
                <td><?php echo strCity($planet["city"]); ?></td>
                </tr>
                <tr>
                <th>Status</th>
                <td>
                    <select class="form-control" id="status" name="statusId">
                    <?php 
                        foreach (PLANET_STATUSES as $key => $value):
                        if ($key == $planet["status"])
                            echo "<option selected value=\"$key\">$value</option>\n";
                        else
                            echo "<option value=\"$key\">$value</option>\n";
                        endforeach;
                    ?>
                    </select>
                </td>
                </tr>
                <tr>
                <th>Description</th>
                <td>
                    <textarea class="form-control" name="description"><?php echo $planet["description"]; ?></textarea>
                </td>
                </tr>
            </tbody>
        </table>
        <input type="submit" class="btn btn-danger" value="Submit"/>
    </form>
</main>
<?php require_once 'views/global/footer.php'; ?>