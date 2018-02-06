<?php 

require 'vendor/autoload.php';
use Illuminate\Database\Capsule\Manager;

Manager::schema()->dropIfExists('departments');
Manager::schema()->create('departments', function($t) {
  $t->increments('id');
  $t->string('name');
  $t->timestamps();
});



Manager::schema()->dropIfExists('subjects');
Manager::schema()->create('subjects', function($t) {
  $t->increments('id');
  $t->string('name');
  $t->integer('department_id')->unsigned();
  $t->timestamps();
});







