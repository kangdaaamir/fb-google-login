@extends('layouts.app')
@section('content')


<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{$user->name}} Register</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
        <form action="{{route('home.registeration', $user->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputname1">Name</label>
                  <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleInputfirstname1" placeholder="Enter Name">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" value="{{$user->email}}"  class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <!-- <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">RePassword</label>
                  <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div> -->
                <div class="form-group">
                  <label for="exampleInputphone1">Phone</label>
                  <input type="phone" name="phone" value="{{$user->phone}}" class="form-control" id="exampleInputphone1" placeholder="Enter Phone">
                </div>
              </div>

               <div class="form-group">
               <label for="exampleInputUserType">User Type</label>
                <select name="user_type_id" id="user_type_id" class="form-control">
                  <option value="">Select a User Type</option>
                           @foreach ($usertypes as $usertype)
                                  <option value="{{ $usertype->id }}" {{$user->user_type_id == $usertype->id ? "selected" : "" }}>{{ $usertype->user_type_name }}</option>
                           @endforeach
                     </select>
              </div>

              <div class="form-group">
                              @if($user->image)
              <img id="original" src="{{ asset('users/'.$user->image) }}" height="70" width="70">
              @endif
              <input type="file" name="image" class="form-control" placeholder="">
              <span class="text-danger">{{ $errors->first('image') }}</span>
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection
