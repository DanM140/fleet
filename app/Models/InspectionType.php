<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionType extends Model
{
    use HasFactory;
    protected $table = "inspection_type";
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getInspectionType()
    {
        $return = self::select('inspection_type.*'
        )
             ->where('is_deleted','=',0);
             $return=$return ->orderBy('id','desc')
             ->paginate(10);
             return $return;
    }
}
