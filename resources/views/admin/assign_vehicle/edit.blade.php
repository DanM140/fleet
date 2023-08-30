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
             
              <form  method="post" action="" >
              {{csrf_field()}}
                <div class="card-body">
                <div class="row" >
                <div class="col-md-6">
                <div class="form-group">
                  <label>Driver</label>
                  <select class="form-control select2" style="width: 100%;" name="driver_id">
                    <option selected="selected">--Select Driver ---</option>
                    @foreach ($getDriver as $data)
  <option {{(old('driver_id',$getRecord->driver_id)==$data->id)?'selected':''}} value="{{$data->id}}"> {{$data->name}}</option>
      @endforeach
                  </select>
                  <div style="color:red">{{$errors->first('driver_id')}}</div> 
                </div>
  <div class="form-group">
                  <label>Vehicle</label>
                  <select class="form-control select2" style="width: 100%;" name="vehicle_id">
                    <option selected="selected">--Select Vehicle--</option>
                    @foreach ($getVehicle as $data)
  <option {{(old('vehicle_id',$getRecord->vehicle_id)==$data->id)?'selected':''}} value="{{$data->id}}"> {{$data->name}}</option>
      @endforeach
                  </select>
                  <div style="color:red">{{$errors->first('vehicle_id')}}</div> 
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