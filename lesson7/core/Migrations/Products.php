<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Migrations\Migration;

class ProductsMigration extends Migration
{
  protected $table = 'products';
  
  public function up()
  {
    Capsule::schema()->create($this->table, function($table) {
      $table->increments('id');
      $table->string('title');
      $table->string('alias');
      $table->integer('category');
    });
  }
  
  public function down()
  {
    Capsule::schema()->drop($this->table);
  }
}