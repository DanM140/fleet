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
             
              <form  method="post" action="" enctype="multipart/form-data" >
              {{csrf_field()}}
                <div class="card-body">
                <div class="row" >
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Name">
                 </div>
                 <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Color</label>
                    <input type="text" class="form-control" name="color"  placeholder="Color">
                 </div>
                 <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Registration</label>
                    <input type="text" class="form-control" name="registration"  placeholder="Registration">
                 </div>
                 <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Engine Number</label>
                    <input type="text" class="form-control" name="engine_number"  placeholder="Engine Number">
                 </div>
                 <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Chasis Number</label>
                    <input type="text" class="form-control" name="chasis_number"  placeholder="Chasis Number">
                 </div>
     


                 <div class="form-group col-md-6">
<label >Status <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
    <select class="form-control" required
     name="active" >
      <option value="">Select Status</option>
      <option {{(old('active')=='Active')?'selected':''}} value="0">Active</option>
      <option {{(old('active')=='InActive')?'selected':''}} value="1">In Active</option>
      
    </select>
    <div style="color:red">{{$errors->first('active')}}</div>
</div>
                  

                  <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Photo
      <span style="color:red;" class="w3-text-large">
***
    </span></label>
    <input type="file" class="form-control" name="picture" 
    placeholder="Photo" >
    <div style="color:red">{{$errors->first('picture')}}</div> 
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