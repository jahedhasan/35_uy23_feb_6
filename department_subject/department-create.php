<?php 
require 'vendor/autoload.php';     
$message = '';

if (isset($_POST['name'])) {
  $name = $_POST['name'];
  Department::insert([
    'name' => $name
  ]);
  $message = 'insert successful';
}


 ?>
<?php require 'partials/header.php'; ?>
<div class="container mt-5">
  <?php if (!empty($message)): ?>
    <div class="alert alert-success">
      <?= $message; ?>
    </div>
  <?php endif ?>
  <form action="" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
      <button class="btn btn-info" type="submit">Add department</button>
    </div>

  </form>
</div>
<?php require 'partials/footer.php'; ?>