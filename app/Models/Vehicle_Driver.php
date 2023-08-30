<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Vehicle_Driver extends Model
{
    use HasFactory;
    protected $table = "vehicles_drivers";
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getVehicles_Drivers()
    {
        $return = self::select('vehicles_drivers.*', 'users.name as first_name',
        'users.last_name as last_name',
        'users.national_id as national_id',
        'vehicles.name as vehicle_name'
        ,
        'vehicles.registration as registration'
        ,
        'users.license as license'
        )
        ->join('vehicles','vehicles.id','=','vehicles_drivers.vehicle_id')
        ->join('users','users.id','=','vehicles_drivers.driver_id')
             ->where('vehicles_drivers.is_deleted','=',0);
             $return=$return ->orderBy('vehicles_drivers.id','desc')
             ->paginate(10);
             return $return;
    }
}
