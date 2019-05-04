<?php
  defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');
  require_once 'views/global/header.php';
  require_once 'views/global/nav.php';
?>
<main role="main" class="container">
    <h3>Add New Planet</h3>
    <form method="POST" action="index.php?page=planet&action=savePlanet">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputName" class="sr-only">Name</label>
                    <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required>
                </div>
            
                <div class="form-group">
                    <label for="inputRegion" class="sr-only">Region</label>
                    <input type="text" id="inputRegion" name="region" class="form-control" placeholder="Region">
                </div>
            
                <div class="form-group">
                    <label for="inputSector" class="sr-only">Sector</label>
                    <input type="text" id="inputSector" name="sector" class="form-control" placeholder="Sector">
                </div>
                <div class="form-group">
                    <label for="inputSystem" class="sr-only">System</label>
                    <input type="text" id="inputSystem" name="system" class="form-control" placeholder="System">
                </div>
            
                <div class="form-group">
                    <label for="inputInhabitant" class="sr-only">Inhabitant</label>
                    <input type="text" id="inputInhabitant" name="inhabitant" class="form-control" placeholder="Inhabitant">
                </div>
            
                <div class="form-group">
                    <label for="inputCity" class="sr-only">City</label>
                    <input type="text" id="inputCity" name="city" class="form-control" placeholder="City">
                </div>
            
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </div>
        </div>
    </form>
</main>
<?php require_once 'views/global/footer.php'; ?>