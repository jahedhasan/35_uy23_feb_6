<?php 
require 'vendor/autoload.php';

$departments = Department::all();

 ?>
<?php require 'partials/header.php'; ?>

<div class="container">
  <h2>All departments</h2>
  <hr>
  <?php foreach ($departments as $department): ?>
    <h4 class="my-3"><?= $department->name ?></h4>

    <?php foreach ($department->subjects as $subject): ?>
      <li class="list-group-item mb-2"><?= $subject->name ?></li>
    <?php endforeach ?>
    
  <?php endforeach ?>
</div>

<?php require 'partials/footer.php'; ?>
