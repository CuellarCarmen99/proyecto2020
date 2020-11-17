<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    protected $fillable = ['name', 'telephone', 'address','web_site'];
    protected $table ='providers';

    //relacion uno a muchos/one to many
    public function sales(){
        
        return $this->hasMany ('App\sale');
    }
    //relacion uno a muchos/one to many
    public function products(){

        return $this->hasMany ('App\product');
    }
}
