<?php

namespace App\Models;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cert_type extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $table = 'cert_types';
    // protected $primaryKey = 'id';
    // protected $fillable = ['cert_type_desc','cert_type_abbr','certype_code','status_id'];
    // public function Status(){
    //     return $this->has(Status::class ,'status_id');
    // }

    public function Status(){
        return $this->belongsTo(Status::class ,'status_id');
    }
}
