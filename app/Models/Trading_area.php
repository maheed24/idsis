<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trading_area extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Status(){
        return $this->belongsTo(Status::class ,'status_id');
    }
}
