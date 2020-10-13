<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    protected $table ='bills';

    //uno a uno
    public function peopleclient(){
        //para clients
        return $this->belongsTo ('App\person', 'people_id');
    }

    public function peopleemployee(){
        //para employee
        return $this->belongsTo ('App\person', 'people_id');
    }
    public function sales(){
        return $this->belongsTo ('App\sale', 'sales_id');
    }
}
