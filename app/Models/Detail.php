<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Ship_type(){
        return $this->hasMany('App\Models\Ship_type','id','ship_type_id');
    }
    public function Trading_area(){
        return $this->hasMany('App\Models\Trading_area','id','trading_area_id');
    }
    public function Hull_material(){
        return $this->hasMany('App\Models\Hull_material','id','hull_material_id');
    }
    public function Stem_type(){
        return $this->hasMany('App\Models\Stem_type','id','stem_type_id');
    }
    public function Stern_type(){
        return $this->hasMany('App\Models\Stern_type','id','stern_type_id');
    }
    public function Ship_classification(){
        return $this->hasMany('App\Models\Ship_classification','id','ship_classification_id');
    }
    public function Rig_type(){
        return $this->hasMany('App\Models\Rig_type','id','rig_type_id');
    }
    public function Operation(){
        return $this->hasMany('App\Models\Operation','id','operation_id');
    }
    public function Acquisition_type(){
        return $this->hasMany('App\Models\Acquisition_type','id','acquisition_type_id');
    }
    public function Office(){
        return $this->belongsTo(Office::class ,'office_id');
    }
    public function Status(){
        return $this->belongsTo(Status::class ,'status_id');
    }

    public function shipPropulsions(){
        return $this->hasMany(Ship_propulsion::class, 'details_id', 'id');
    }

    public function certificate_licenses(){
        return $this->hasMany(Certificate_license::class, 'details_id', 'id');
    }
    


}
