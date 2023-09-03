<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stern_type extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Status(){
        return $this->belongsTo(Status::class ,'status_id');
    }
}
