@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Driver's Form</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
             
              <!-- /.card-header -->
              <!-- form start -->
             
              <form  method="post" action="" enctype="multipart/form-data" >
              {{csrf_field()}}
                <div class="card-body">
                <div class="row" >
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name',$getRecord->name)}}" placeholder="First Name">
                    <div style="color:red">{{$errors->first('name')}}</div>
                </div>
                 <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{old('last_name',$getRecord->last_name)}}"  placeholder="Last Name">
                    <div style="color:red">{{$errors->first('last_name')}}</div>
                </div>
                 <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">National ID</label>
                    <input type="number" class="form-control" name="national_id" value="{{old('national_id',$getRecord->national_id)}}"  placeholder="National Id">
                    <div style="color:red">{{$errors->first('national_id')}}</div>
                </div>
                 <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">License</label>
                    <input type="text" class="form-control" name="license" value="{{old('license',$getRecord->license)}}"  placeholder="License">
                    <div style="color:red">{{$errors->first('license')}}</div>
                </div>
                 <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Residence</label>
                    <input type="text" class="form-control" name="residence" value="{{old('residence',$getRecord->residence)}}" placeholder="Residence">
                    <div style="color:red">{{$errors->first('residence')}}</div>
                </div>
                 <div class="form-group col-md-6">
<label >Date Of Birth  <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
<input type="date" class="form-control" name="dob"  required
    value="{{old('dob,$getRecord->dob')}}" placeholder="Date Of Birth" > 
    <div style="color:red">{{$errors->first('dob')}}</div> 
</div>


<div class="form-group col-md-6">
<label >Primary Phone Number </label>
<input type="number" class="form-control" name="mobile_number"  
value="{{old('mobile_number',$getRecord->mobile_number)}}" placeholder="Phone Number" >  
    <div style="color:red">{{$errors->first('mobile_number')}}</div> 
</div>
<div class="form-group col-md-6">
<label >Secondary Phone Number </label>
<input type="number" class="form-control" name="secondary_number"  
    value="{{old('secondary_number,$getRecord->secondary_number')}}" placeholder="Secondary Phone Number" >  
    <div style="color:red">{{$errors->first('secondary_number')}}</div> 
</div>
                 <div class="form-group col-md-6">
<label >Gender <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
    <select class="form-control" required
     name="gender" >
      <option value="">Select Gender</option>
      <option {{(old('gender',$getRecord->gender)=='Male')?'selected':''}} value="Male">Male</option>
      <option {{(old('gender',$getRecord->gender)=='Female')?'selected':''}} value="Female">Female</option>
      
    </select>
    <div style="color:red">{{$errors->first('gender')}}</div>
</div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{old('email',$getRecord->email)}}" placeholder="Enter email">
                    <div style="color:red">{{$errors->first('email')}}</div>
                </div>
                  </div>

                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           
           
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection