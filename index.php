<?php 
require 'vendor/autoload.php';

$departments = Department::all();

 ?>

<?php require 'partials/header.php'; ?>
<div class="container mt-5">
  <h1>All departments</h1>
  <hr>
  <?php foreach ($departments as $department): ?>
    <h2><?= $department->name; ?></h2>
    <ul class="list-group">
      <?php foreach ($department->subjects as $subject): ?>
        <li class="list-group-item"><?= $subject->name; ?></li>
        
      <?php endforeach ?>
      
    </ul>
  <?php endforeach ?>
</div>
<?php require 'partials/footer.php'; ?>
