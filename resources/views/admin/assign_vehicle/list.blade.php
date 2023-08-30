@extends('layouts.app')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <section class="content-header">
      <div class="container-fluid">
   
      <div class="card card-primary">
             
             <!-- /.card-header -->
             <!-- form start -->
             <h1 style="float:left;">Search..</h1>
             <form  method="get" action=""  >
               <div class="card-body">
               <div class="row" >
               <div class="form-group col-md-3">
                   <label for="exampleInputPassword1">First Name</label>
                   <input type="text" class="form-control" value="{{Request::get('name')}}" name="name"  placeholder="First Name">
                </div>
                <div class="form-group col-md-3">
                   <label for="exampleInputPassword1">Last Name</label>
                   <input type="text" class="form-control" value="{{Request::get('last_name')}}" name="last_name"  placeholder="Last Name">
                </div>
                <div class="form-group col-md-3">
                   <label for="exampleInputPassword1">National ID</label>
                   <input type="number" class="form-control" value="{{Request::get('national_id')}}" name="national_id"  placeholder="National Id">
                </div>
                <div class="form-group col-md-3">
                   <label for="exampleInputPassword1">License</label>
                   <input type="text" class="form-control" value="{{Request::get('license')}}" name="license"  placeholder="Driving License">
                </div>
                <div class="form-group col-md-3">
                   <label for="exampleInputPassword1">Vehicle'S Registration</label>
                   <input type="text" class="form-control" name="residence" value="{{Request::get('registration')}}" 
                    placeholder="Vehicle'S Registration">
                </div>
               
               <div class="form-group col-md-3">
    <button class="btn btn-primary" type="submit" style="margin-top:30px">Search</button>
    <a href="{{url('admin\assign_vehicle\list')}}" class="btn btn-success" style="margin-top:30px">Reset</a>
</div>
               </div>
               <!-- /.card-body -->

             
             </form>
           </div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vehicles'-Drivers' List</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('admin/assign_vehicle/add')}}" class="btn btn-primary" >Assign Vehicle</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
   
      <div class="container-fluid">
     
      
        <!-- /.row -->
        <div class="row">
       
          <div class="col-12">
            <div class="card">
            @include('message')
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Driver's Name</th>
                      <th>Vehicle's Name</th>
                      <th>Driver's National ID</th>
                      <th>Vehicle'S Registration</th>
                      <th>Driving License</th>
                     <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->first_name}} {{$value->last_name}}</td>
                      <td>{{$value->vehicle_name}}</td>
                      <td>{{$value->national_id}}</td>
                      <td>{{$value->registration}}</td>
                      <td>{{$value->license}}</td>
                  
                      <td><a href="{{url('admin/assign_vehicle/edit/'.$value->id)}}" class=" btn btn-primary">Edit </a>
      <a href="{{url('admin/assign_vehicle/delete/'.$value->id)}}" class=" btn btn-secondary">Delete </a>
                      </td>
                    </tr>
                   @endforeach
                     
                  </tbody>
                </table>
                <div style="padding:10px;" class="text-center">
{!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      
       
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
@endsection
@section('script')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('.js-example-basic-single').select2({
        theme: "classic"
    });
});
</script>

@endsection