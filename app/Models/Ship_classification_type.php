<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_classification_type extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Ship_type(){
        return $this->hasMany('App\Models\Ship_type','id','ship_type_id');
    }
    public function Ship_classification(){
        return $this->hasMany('App\Models\Ship_classification','id','ship_classification_id');
    }

    public function Status(){
        return $this->belongsTo(Status::class ,'status_id');
    }
}
