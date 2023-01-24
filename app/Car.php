<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{





  // Table Name
  protected $table = 'cars';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;

  public function users(){
    return $this->hasMany('App\User');
}

public function rents(){
  return $this->hasMany('App\Rent');
}




}
