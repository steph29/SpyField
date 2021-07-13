<?php
session_start();

?>
<div class="container my-5">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4>Add New Mission
</h4>
<a href="<?= $router->generate('admin')?>" class="btn btn-outline-danger float-end">Back</a>
</div>


<div class="card-body">
<form action="<?= $router->generate('code')?>" method="post">
<div class="form-group mb-3">
<label for="">Secret Agent</label>
<input type="text" name="agent" class="form-control">
</div>
<div class="form-group mb-3">
<label for="">Type of mission</label>
<input type="text" name="missiontype" class="form-control">
</div>
<div class="form-group mb-3">
<label for="">Country</label>
<input type="text" name="country" class="form-control">
</div>
<div class="form-group mb-3">
<label for="">Target</label>
<input type="text" name="target" class="form-control">
</div>
<div class="form-group mb-3">
<button type="submit" name="add_mission" class="btn btn-outline-primary">Add Mission</button>
</div>
</form>
</div>
</div>

</div>
</div>
</div>
