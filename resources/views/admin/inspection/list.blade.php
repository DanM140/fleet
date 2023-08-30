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
            
           </div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Active Drivers' List</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('admin/inspection/add')}}" class="btn btn-primary">Add Inspection</a>
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
                      <th>Supervisor</th>
                      <th>Inspection Type</th>
                      <th>Date Of Inspection</th>
                      <th>Vehicle Id</th>
                      <th>Driver Id</th>
                      <th>Place</th>
                     <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                    <tr>
                      <td>{{$value->id}}</td>
          
                      <td>{{$value->supervisor}}</td>
                      <td>{{$value->inspection_type}}</td>
                      <td>{{date('d-m-Y H:i A',strtotime($value->inspection_date))}}</td>
                      <td>{{$value->vehicle_id}}</td>
            
                      <td>{{$value->driver_id}}</td>
                      <td>{{$value->place}}</td>
                  
                      <td><a href="{{url('admin/inspection/edit/'.$value->id)}}" class=" btn btn-primary">Edit </a>
      <a href="{{url('admin/inspection/delete/'.$value->id)}}" class=" btn btn-secondary">Delete </a>
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