<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Migrations\Migration;

class CategoriesMigration extends Migration
{
  protected $table = 'categories';
  
  public function up()
  {
    Capsule::schema()->create($this->table, function($table) {
      $table->increments('id');
      $table->string('title');
      $table->string('alias');
    });
  }
  
  public function down()
  {
    Capsule::schema()->drop($this->table);
  }
}