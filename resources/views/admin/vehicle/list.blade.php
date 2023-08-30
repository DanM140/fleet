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
             <h1 style="float:left;">Search Vehicle..</h1>
             <form  method="get" action=""  >
               <div class="card-body">
               <div class="row" >
               <div class="form-group col-md-3">
                   <label for="exampleInputPassword1">Name</label>
                   <input type="text" class="form-control" value="{{Request::get('name')}}" name="name"  placeholder="Name">
                </div>
                <div class="form-group col-md-3">
                   <label for="exampleInputPassword1">Color</label>
                   <input type="text" class="form-control" value="{{Request::get('color')}}" name="color"  placeholder="Color">
                </div>
                <div class="form-group col-md-3">
                   <label for="exampleInputPassword1">Registration</label>
                   <input type="text" class="form-control" value="{{Request::get('registration')}}" name="registration"  placeholder="Registration">
                </div>
                <div class="form-group col-md-3">
                   <label for="exampleInputPassword1">Engine Number</label>
                   <input type="text" class="form-control" value="{{Request::get('engine_number')}}" name="engine_number"  placeholder="Engine Number">
                </div>
                <div class="form-group col-md-3">
                   <label for="exampleInputPassword1">Chasis Number</label>
                   <input type="text" class="form-control" name="chasis_number" value="{{Request::get('chasis_number')}}"  placeholder="Chasis Number">
                </div>
                <div class="form-group col-md-3">
    <label  class="form-label">Status</label>
    <select class="form-control" name="active">
      <option value="">Select</option>
  <option {{(Request::get('active')==0)?'selected':''}} value="0">Active</option>
  <option {{(Request::get('active')==1)?'selected':''}} value="1">In Active</option>
    </select>
  </div>
               <div class="form-group col-md-3">
    <button class="btn btn-primary" type="submit" style="margin-top:30px">Search</button>
    <a href="{{url('admin\vehicle\list')}}" class="btn btn-success" style="margin-top:30px">Reset</a>
</div>
               </div>
               <!-- /.card-body -->

             
             </form>
           </div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Active Vehicles' List</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('admin/vehicle/add')}}" class="btn btn-primary">Add Vehicle</a>
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
                      <th>Picture</th>
                      <th>Name</th>
                      <th>Color</th>
                      <th>Registration</th>
                      <th>Engine No</th>
                      <th>Chasis No</th>
                      <th>Active</th>
                     <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>
           @if(!empty($value->getProfile()))
           <img src="{{$value->getProfile()}}"
           style="height:50px;width:50px;border-radius:50px"
           alt="Profile pic">
           @endif
      </td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->color}}</td>
                      <td>{{$value->registration}}</td>
                      <td>{{$value->engine_number}}</td>
                      <td>{{$value->chasis_number}}</td>
                      @if($value->active==0)

<td> <span class="badge badge-primary">Active</span></td>
@else
<td> <span class="badge badge-danger">In Active</span></td>
@endif
                  
                      <td><a href="{{url('admin/vehicle/edit/'.$value->id)}}" class=" btn btn-primary">Edit </a>
      <a href="{{url('admin/vehicle/delete/'.$value->id)}}" class=" btn btn-secondary">Delete </a>
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