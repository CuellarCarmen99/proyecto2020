<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name', 'description'];
    protected $table ='categories';

    // relacion uno a muchos/one to many
public function products(){

    return $this->hasMany ('App\product');
    }
}
