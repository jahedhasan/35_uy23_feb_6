
# making a website with multiple tables     

### installing illuminate/database package  with dependancy   

~~~bash
composer require illuminate/database illuminate/events 
~~~

### connect with database (db.php)

~~~php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'fgc',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent(); 
~~~


### adding db.php file to composer.json file to autolaod and doing `composer dump-autoload` 

~~~php
"autoload": {
  "files": ["db.php"]
}
~~~


### creating table using schema builder    

~~~php
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager;


Manager::schema()->dropIfExists('departments');
Manager::schema()->create('departments', function ($t) {
  $t->increments('id');
  $t->string('name');
  $t->timestamps();
});


Manager::schema()->dropIfExists('subjects');
Manager::schema()->create('subjects', function ($t) {
  $t->increments('id');
  $t->string('name');
  $t->integer('department_id')->unsigned();
  $t->timestamps();
});

~~~

### Create 2 models Subject and Department with relationship        

for 2 tables we have to make 2 models. By convention model name is singular form of tables name.

~~~php

# Department

use Illuminate\Database\Eloquent\Model;

class Department extends Model {
  protected $guarded = [];

  public function subjects () {
    return $this->hasMany(Subject::class);
  }
}

# Subject
use Illuminate\Database\Eloquent\Model;

class Subject extends Model {
  protected $guarded = [];
  public function department () {
    return $this->belongsTo(Department::class);
  }
}

~~~

### adding model folder to composer.json file to autolaod all models and doing `composer dump-autoload` 

~~~php
"autoload": {
  "classmap": ["models"]
}
~~~

### inserting data using model    

~~~php
Model::insert([
  "key" => $value
])
~~~


### getting value from database using model    

~~~php
# for getting all results    
Model::all();
~~~


### fetching data using relationship    

~~~php
$departments = Department::all();
foreach($departments as $department) {
  echo $department->name;
  foreach($department->subjects as $subject) {
    echo $subject->name;
  }
}
~~~





















