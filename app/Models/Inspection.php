<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;
    protected $table = "inspection";
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getRecord()
    {
        $return = self::select('inspection.*'
        )
             ->where('is_deleted','=',0);
             $return=$return ->orderBy('id','desc')
             ->paginate(10);
             return $return;
    }
    static public function getAlreadyFirst($vehicle_id,$inspection_date,$inspection_type)
    {
        return self::where('vehicle_id','=',$vehicle_id)
        ->where('inspection_date','=',$inspection_date)
        ->where('inspection_type','=',$inspection_type)
        ->first();
    }
    static public function getInspectionTypeCheck($vehicle_id,$inspection_date){
        return self::where('vehicle_id','=',$vehicle_id)
        ->where('inspection_date','=',$inspection_date)
        ->where('is_deleted','=',0)
        ->get(); 
    }
    static public function deleteInspection($vehicle_id,$inspection_date)
    {
        return self::where('vehicle_id','=',$vehicle_id)
        ->where('inspection_date','=',$inspection_date)
        ->delete(); 
    }
}
