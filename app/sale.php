<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    protected $fillable = ['quantity', 'products_id', 'providers_id'];
    protected $table ='sales';

    //relacion de uno a muchos/one to many

    public function providers(){
        return $this->hasMany ('App\provider');
    }

    public function products(){
        return $this->hasMany ('App\product');
    }

    //relacion de uno a uno
    public function bills(){
        return $this->belongsTo ('App\bill', 'bills_id');
    }
}
