@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vehicle's Form</h1>
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
             
              <form  method="post" action=""  >
              {{csrf_field()}}
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Inspection Supervisor</label>
                    <input type="text" class="form-control" name="supervisor" value="{{old('supervisor',$getRecord->supervisor)}}"  
                    placeholder="Inspection Supervisor">
                 </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Inspection Place</label>
                    <input type="text" class="form-control" name="place" value="{{old('place',$getRecord->place)}}"   placeholder="Place Of Inspection">
                 </div>
                 <div class="form-group col-md-6">
<label >Date Of Inspection  <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
<input type="date" class="form-control" name="inspection_date" disabled
    value="{{old('inspection_date',$getRecord->inspection_date)}}" placeholder="Date Of Inspection" > 
    <div style="color:red">{{$errors->first('inspection_date')}}</div> 
</div>
                  </div>
     <div class="row">
     <div class="form-group col-md-6">
        <label  class="form-label">Driver</label>
        <select class="form-control select2" name="driver_id" required>
  <option value="">Select Driver</option>
  @foreach($getDriver as $driver)
  <option  {{($driver->id==$getRecord->driver_id)?"selected":""}} value="{{$driver->id}}">{{$driver->name}}</option>
  @endforeach
    </select>
    
  </div>
  <div class="form-group col-md-6">
        <label  class="form-label">Vehicle</label>
        <select class="form-control select2" name="vehicle_id" disabled="disabled" required>
  <option value="">Select Vehicle</option>
  @foreach($getVehicle as $vehicle)
  <option  {{($vehicle->id==$getRecord->vehicle_id)?"selected":""}} value="{{$vehicle->id}}">{{$vehicle->name}}</option>
  @endforeach
    </select>
    
  </div>
     </div>
                
  <div class="form-group">
        <label  class="form-label">Inspection </label>
        @foreach($getInspectionType as $type)
      @php
          $checked="";
      @endphp
      @foreach($getInspectionTypeCheck as $inspectiontypecheck)
       @if($inspectiontypecheck->inspection_type==$type->id)
       @php
          $checked="checked";
      @endphp
       @endif
      @endforeach
      <div>
      <label style="font-weight:normal"> 
        <input {{$checked}} type="checkbox" value="{{$type->id}}" name="inspection_type[]">{{$type->name}}
      </label>
      </div>
      
      @endforeach  
      
       
    
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
  @section('script')
<script src="{{url('public/plugins/select2/js/select2.full.min.js')}} "></script>
<script>
 
  
   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
   }
   )
</script>
  @endsection