<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    //




    // Relations

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
