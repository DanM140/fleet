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
             <h1 style="float:left;">Search Drivers..</h1>
             <form  method="get" action=""  >
               <div class="card-body">
               <div class="row" >
               <div class="form-group col-md-3">
                   <label for="exampleInputPassword1">Name</label>
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
                   <input type="text" class="form-control" value="{{Request::get('license')}}" name="license"  placeholder="License">
                </div>
                <div class="form-group col-md-3">
                   <label for="exampleInputPassword1">Residence</label>
                   <input type="text" class="form-control" name="residence" value="{{Request::get('residence')}}"  placeholder="Residence">
                </div>
                <div class="form-group col-md-3">
<label >Date Of Birth  <span style="color:red;"
class="w3-text-large">
***
   </span></label>
<input type="date" class="form-control" name="dob"  
value="{{Request::get('dob')}}" placeholder="Date Of Birth" > 
  
</div>

               </div>
               <div class="form-group col-md-3">
    <button class="btn btn-primary" type="submit" style="margin-top:30px">Search</button>
    <a href="{{url('admin\drivers\list')}}" class="btn btn-success" style="margin-top:30px">Reset</a>
</div>
               </div>
               <!-- /.card-body -->

             
             </form>
           </div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Active Drivers' List</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('admin/drivers/add')}}" class="btn btn-primary">Add Driver</a>
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
                      <th>Gender</th>
                      <th>DOB</th>
                      <th>National Id</th>
                      <th>Email</th>
                      <th>Primary Number</th>
                      <th>Secondary Number</th>
                      <th>License</th>
                      <th>Residence</th>
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
                      <td>{{$value->name}} {{$value->last_name}}</td>
                      <td>{{$value->gender}}</td>
                      <td>{{date('d-m-Y H:i A',strtotime($value->dob))}}</td>
                      <td>{{$value->national_id}}</td>
                      <td><span class="tag tag-success">{{$value->email}}</span></td>
                      <td>{{$value->mobile_number}}</td>
                      <td>{{$value->secondary_number}}</td>
                      <td>{{$value->license}}</td>
                      <td>{{$value->residence}}</td>
                      <td><a href="{{url('admin/drivers/edit/'.$value->id)}}" class=" btn btn-primary">Edit </a>
      <a href="{{url('admin/drivers/delete/'.$value->id)}}" class=" btn btn-secondary">Delete </a>
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