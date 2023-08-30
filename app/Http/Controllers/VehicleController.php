<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Str;
class VehicleController extends Controller
{
    public function list(){
       $data['getRecord']= Vehicle::getVehicle();
       return view('admin.vehicle.list',$data);
    }
    public function add(){
        return view('admin.vehicle.add');
    }
    public function insert(Request $request){
        
     $vehicle= new Vehicle;
     
     $vehicle->name=trim($request->name);
     $vehicle->color=trim($request->color);
     $vehicle->registration=trim($request->registration);
     $vehicle->engine_number=trim($request->engine_number);
     $vehicle->chasis_number=trim($request->chasis_number);
     $vehicle->active=trim($request->active);
     if(!empty($request->file('picture')))
{
    if(!empty($vehicle->getProfile()))
    {
  unlink('upload/picture/'.$vehicle->picture);
    }
    $ext=$request->file('picture')
    ->getClientOriginalExtension();
    $file=$request->file('picture');
    $randomStr=date('Ymdhis').Str::random(20);
    $filename= strtolower($randomStr).'.'.$ext;
    $file->move('upload/picture/',$filename);
    $vehicle->picture=$filename;
}
     
     $vehicle->save();
     return redirect('admin/vehicle/list')
     ->with('success',"Vehicle successfully added");
   
    }
    public function edit($id){
        $data['getRecord']=Vehicle::getSingle($id);
        if(!empty($data['getRecord'])){
            return view('admin.vehicle.edit',$data);
        }else{
            abort(404);
        }
         
    }
    public function update($id,Request $request){
        $vehicle = Vehicle::getSingle($id);
        $vehicle->name=trim($request->name);
     $vehicle->color=trim($request->color);
     $vehicle->registration=trim($request->registration);
     $vehicle->engine_number=trim($request->engine_number);
     $vehicle->chasis_number=trim($request->chasis_number);
     $vehicle->active=trim($request->active);
        
        $vehicle->save();
        return redirect('admin/vehicle/list')
        ->with('success',"Vehicle successfully Updated");
    }
    public function delete($id){
        $vehicle = Vehicle::getSingle($id);
        $vehicle->is_deleted=1; 
        $vehicle->save();
        return redirect('admin/vehicle/list')
        ->with('success',"Vehicle successfully deleted");
    }
}

