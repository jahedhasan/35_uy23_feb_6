<?php 
require 'vendor/autoload.php';     
$message = '';
$departments = Department::all();

if (isset($_POST['name'])) {
  $name = $_POST['name'];
  Subject::insert([
    'name' => $name,
    'department_id' => $_POST['department_id']
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
      <label for="department_id">Department</label>
      <select name="department_id" id="department_id" class="form-control">
        <?php foreach ($departments as $department): ?>
          <option value="<?= $department->id ?>"><?= $department->name ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <button class="btn btn-info" type="submit">Add subject</button>
    </div>

  </form>
</div>
<?php require 'partials/footer.php'; ?>