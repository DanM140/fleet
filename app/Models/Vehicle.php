<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class Vehicle extends Model
{
    use HasFactory;
    protected $table="vehicles";
    static public function getVehicle()
    {
        $return = self::select('vehicles.*') 
        ->where('is_deleted','=',0);
        if(!empty(Request::get('name'))){
            $return=$return->where('name','like','%'.Request::get('name').'%');  
        }
        if(!empty(Request::get('color'))){
            $return=$return->where('color','like','%'.Request::get('color').'%');  
        }
        if(!empty(Request::get('registration'))){
            $return=$return->where('registration','like','%'.Request::get('registration').'%');  
        }
        if(!empty(Request::get('engine_number'))){
            $return=$return->where('engine_number','like','%'.Request::get('engine_number').'%');  
        }
        if(!empty(Request::get('chasis_number'))){
            $return=$return->where('chasis_number','like','%'.Request::get('chasis_number').'%');  
        }
        if(!empty(Request::get('active'))){
            $return=$return->whereDate('active','=',Request::get('active'));  
        }
      
        $return=$return ->orderBy('id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getSingle($id){
        return self::find($id);
    }
    public function getprofile()
     {
        if(!empty($this->picture) && file_exists('upload/picture/'.$this->picture))
        {
             return url('upload/picture/'.$this->picture);
        }
        else{
            return "";
        }
     }
}
