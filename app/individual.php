<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class individual extends Model
{
    protected $fillable = ['name', 'lastname', 'ci','telephone','address','rols_id'];
    protected $table =['individuals'];

    //relacion de uno a muchos
    public function bills(){
        return $this->hasMany ('App\bill');
    }

    //uno a uno
    public function rols(){
        return $this->belongsTo('App\rol', 'rols_id');
    }
}
