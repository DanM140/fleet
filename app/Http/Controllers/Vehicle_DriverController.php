<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle_Driver;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\InspectionType;
class Vehicle_DriverController extends Controller
{
    public function list()
    {
        $data['getRecord']=Vehicle_Driver::getVehicles_Drivers();
        return view('admin.assign_vehicle.list',$data);
    }
    public function add(){
        $data['getVehicle']=Vehicle::getVehicle();
        $data['getDriver']=User::getDrivers();
       return view('admin.assign_vehicle.add',$data);
    }
    public function insert(Request $request){
        $data['getRecord']=Vehicle_Driver::getVehicles_Drivers();
        $data['getVehicle']=Vehicle::getVehicle();
        $data['getDriver']=User::getDrivers();
        $assign= new Vehicle_Driver;
        request()->validate([
            'vehicle_id'=>'required|unique:vehicles_drivers',
            'driver_id'=>'required|unique:vehicles_drivers'
                ]);
                
        $assign->vehicle_id=trim($request->vehicle_id);
        $assign->driver_id=trim($request->driver_id);
        $assign->save();
        return redirect('admin/assign_vehicle/list')
     ->with('success',"Vehicle successfully added");
    }
    public function edit($id){
        $data['getRecord']=Vehicle_Driver::getSingle($id);
        $data['getVehicle']=Vehicle::getVehicle();
        $data['getDriver']=User::getDrivers();
        if(!empty($data['getRecord'])){
            return view('admin.assign_vehicle.edit',$data);
        }else{
            abort(404);
        }
         
    }
    public function update($id,Request $request){
        request()->validate([
            'driver_id'=>'required|unique:vehicles_drivers,driver_id,'.$id,
            'vehicle_id'=>'required|unique:vehicles_drivers,vehicle_id,'.$id
                ]);
        $assign = Vehicle_Driver::getSingle($id);
        $assign->vehicle_id=trim($request->vehicle_id);
        $assign->driver_id=trim($request->driver_id);
        $assign->save();
        return redirect('admin/assign_vehicle/list')
     ->with('success',"Record successfully added");
    }
    public function delete($id){
        $user = Vehicle_Driver::getSingle($id);
        $user->is_deleted=1; 
        $user->save();
        return redirect('admin/assign_vehicle/list')
        ->with('success',"Record successfully deleted");
    }
}
