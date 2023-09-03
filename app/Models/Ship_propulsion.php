<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_propulsion extends Model
{
    use HasFactory;

    protected $table = 'ship_propulsions';
    protected $guarded = [];

    public function Detail(){
        return $this->belongsTo(Detail::class ,'detail_id');
    }

    public function Status(){
        return $this->belongsTo(Status::class ,'status_id');
    }
}
