<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
  




  // Table Name
  protected $table = 'rents';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;

  public function car(){
    return $this->belongsTo('App\Car');
}


}




