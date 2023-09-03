<?php

namespace App\Models;

use App\Models\Detail;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate_license extends Model
{
    use HasFactory;
    //protected $guarded = [];
    protected $table = 'certificate_licenses';
    protected $primaryKey = 'cert_id';
    protected $fillable = ['or_no','or_date','cert_no','sec_no','cert_type_id','user_id','details_id','amount','qr_code','date_issued','validity'];
    public function Status(){
        return $this->has(Status::class ,'status_id');
    }

    public function Cert_type(){
        return $this->hasMany('App\Models\Cert_type','id','cert_type_id');
    }
    public function User(){
        return $this->hasMany('App\Models\User','id','user_id');
    }
    public function Detail(){
        return $this->belongsTo(Detail::class);
    }
}
