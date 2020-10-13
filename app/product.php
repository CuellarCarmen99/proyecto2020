<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table ='products';

        //relacion de uno a uno/
    public function categories(){

        return $this->belongsTo('App\category', 'categories_id');
    }
    public function providers(){

        return $this->belongsTo('App\provider', 'providers_id');
    }
    public function sales(){

        return $this->belongsTo('App\sale', 'sales_id');
    }
   
}
