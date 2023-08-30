<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\InspectionType;
class InspectionController extends Controller
{
    public function list(){
        $data['getRecord']=Inspection::getRecord();
        return view('admin.inspection.list',$data);
    }
    public function add(Request $request){
        $data['getVehicle']=Vehicle::getVehicle();
        $data['getDriver']=User::getDrivers();
        $data['getInspectionType']=InspectionType::getInspectionType();
        
        return view('admin.inspection.add',$data);
    }
    public function insert(Request $request)
    {
   if(!empty($request->inspection_type)){
    foreach($request->inspection_type as $inspection_type )
      {
        $getAlreadyFirst=Inspection::getAlreadyFirst($request->vehicle_id,$request->inspection_date,$inspection_type);
        if(!empty($getAlreadyFirst))
        {
            return redirect('admin/inspection/list')
            ->with('error',
            ' Inspection already exists');
        }
        else{
            $save =new Inspection;
            $save->inspection_type=$inspection_type;
            $save->supervisor=$request->supervisor;
            $save->driver_id=$request->driver_id;
            $save->vehicle_id=$request->vehicle_id;
            $save->inspection_date=$request->inspection_date;
            $save->place=$request->place;
            $save->save();   
        }
      }
      return redirect('admin/inspection/list')
      ->with('success',
      ' Inspection add successfully');
    }
    else{
        return redirect()
        ->back()
        ->with('error','An error occurred, try again');
    }
    }
    public function edit($id){
        $getRecord=Inspection::getSingle($id);
        if(!empty($getRecord)){
            $data['getRecord']=$getRecord;
            $data['getInspectionTypeCheck'] =Inspection::getInspectionTypeCheck($getRecord->vehicle_id,$getRecord->inspection_date);
            $data['getVehicle']=Vehicle::getVehicle();
            $data['getDriver']=User::getDrivers();
            $data['getInspectionType']=InspectionType::getInspectionType();
            return view('admin.inspection.edit',$data);
        }else{
            abort(404);
        }
        
    }
    public function update(Request $request){
        Inspection::deleteInspection($request->vehicle_id,$request->inspection_date);
        if(!empty($request->inspection_type)){
            foreach($request->inspection_type as $inspection_type )
              {
                $getAlreadyFirst=Inspection::getAlreadyFirst($request->vehicle_id,$request->inspection_date,$inspection_type);
                if(!empty($getAlreadyFirst))
                {
                    return redirect('admin/inspection/list')
                    ->with('error',
                    ' Inspection already exists');
                }
                else{
                    $save =new Inspection;
                    $save->inspection_type=$inspection_type;
                    $save->supervisor=$request->supervisor;
                    $save->driver_id=$request->driver_id;
                    $save->vehicle_id=$request->vehicle_id;
                    $save->inspection_date=$request->inspection_date;
                    $save->place=$request->place;
                    $save->save();   
                }
              }
              return redirect('admin/inspection/list')
              ->with('success',
              ' Inspection add successfully');
            }
            else{
                return redirect()
                ->back()
                ->with('error','An error occurred, try again');
            }
       
    }
    public function delete($id){
        $save=Inspection::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Inspection successfully Deleted");
    }
}
