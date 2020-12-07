<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['name', 'price', 'expiration','existence','categories_id','providers_id'];

    protected $table ='products';

    public function category(){
        return $this->belongsTo(category::class);
    }
    public function provider(){
        return $this->belongsTo(provider::class);
    }

        //relacion de uno a uno/
    /*public function categories(){

        return $this->belongsTo('App\category', 'categories_id');
    }*/
    public function providers(){

        return $this->belongsTo('App\provider', 'providers_id');
    }
    public function sales(){

        return $this->belongsTo('App\sale', 'sales_id');
    }

    public function product()
    {
        return $this->belongsTo(product::class);
    }
   
}



