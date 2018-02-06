<?php 

require 'vendor/autoload.php';
$departments = Department::all();

$message = '';


if ( isset ($_POST['name'])) {
  $name = $_POST['name'];
  $department_id = $_POST['department_id'];

  Subject::insert([
    'name' => $name,
    'department_id' => $department_id
  ]);
  $message = 'subject created successfully';
}


 ?>



<?php require 'partials/header.php'; ?>
<div class="container mt-5">
  <?php if (!empty($message)): ?>
    <div class="alert alert-info">
      <?= $message; ?>
    </div>
  <?php endif ?>
  <form action="" method="post">
    <div class="form-group">
      <label for="name">Subject Name</label>
      <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
      <label for="department_id">Department</label>
      <select class="form-control" name="department_id" id="department_id">
        <?php foreach ($departments as $department): ?>
          <option value="<?= $department->id ?>"><?= $department->name; ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-outline-primary">Add subject</button>
    </div>
  </form>
</div>
<?php require 'partials/footer.php'; ?>

