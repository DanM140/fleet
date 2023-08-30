<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;
use Str;
class DriverController extends Controller
{
    public function list(){
       $data['getRecord']=User::getDrivers();
       return view('admin.drivers.list',$data);
    }
    public function add(){
        return view('admin.drivers.add');
    }
    public function insert(Request $request){
        
     $driver= new User;
     request()->validate([
        'email'=>'required|email|unique:users'
            ]);
     $driver->name=trim($request->name);
     $driver->last_name=trim($request->last_name);
     $driver->email=trim($request->email);
     $driver->gender=trim($request->gender);
     $driver->license=trim($request->license);
     $driver->residence=trim($request->residence);
     $driver->national_id=trim($request->national_id);
     $driver->dob=trim($request->dob);
     $driver->mobile_number=trim($request->mobile_number);
     $driver->secondary_number=trim($request->secondary_number);
     if(!empty($request->file('profile_pic')))
{
    if(!empty($driver->getProfile()))
    {
  unlink('upload/profile/'.$driver->profile_pic);
    }
    $ext=$request->file('profile_pic')
    ->getClientOriginalExtension();
    $file=$request->file('profile_pic');
    $randomStr=date('Ymdhis').Str::random(20);
    $filename= strtolower($randomStr).'.'.$ext;
    $file->move('upload/profile/',$filename);
    $driver->profile_pic=$filename;
}
     $driver->user_type=2;
     $driver->save();
     return redirect('admin/drivers/list')
     ->with('success',"Driver successfully added");
   
    }
    public function edit($id){
        $data['getRecord']=User::getSingle($id);
        if(!empty($data['getRecord'])){
            return view('admin.drivers.edit',$data);
        }else{
            abort(404);
        }
         
    }
    public function update($id,Request $request){
        request()->validate([
            'email'=>'required|email|unique:users,email,'.$id
                ]);
        $driver = User::getSingle($id);
        $driver->name=trim($request->name);
     $driver->last_name=trim($request->last_name);
     $driver->email=trim($request->email);
     $driver->gender=trim($request->gender);
     $driver->license=trim($request->license);
     $driver->residence=trim($request->residence);
     $driver->national_id=trim($request->national_id);
     $driver->dob=trim($request->dob);
     $driver->mobile_number=trim($request->mobile_number);
     $driver->secondary_number=trim($request->secondary_number);
        
        $driver->save();
        return redirect('admin/drivers/list')
        ->with('success',"Driver successfully Updated");
    }
    public function delete($id){
        $user = User::getSingle($id);
        $user->is_deleted=1; 
        $user->save();
        return redirect('admin/drivers/list')
        ->with('success',"Driver successfully deleted");
    }
}
