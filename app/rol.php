<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    protected $table = 'rols';
     
    // relacion uno a muchos/one to many
public function people(){

    return $this->hasMany ('App\people');
}
}
