@extends('main')
@section('title', 'Project Create')
@section('content')


<div class="content-wrapper">   
 
    <!-- Main content -->
    <section class="content">
      @include('partials.validate')


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Project Create</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
        <form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('POST')}}
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputName">Project Title</label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Enter Project Name">
                </div>

                 <div class="form-group">
                  <label for="exampleInputDescription">Description</label>
                  <input type="textarea" name="description" class="form-control" id="description" placeholder="Enter Project Description">
                </div>

                 <div class="form-group">
                <label for="exampleInputProjectImage">Project Image</label>
                <input type="file" name="image" class="form-control" placeholder="">
                <span class="text-danger">{{ $errors->first('image') }}</span>  
                </div>

                 <div class="form-group">
                <label for="exampleInputDueDate">Due Date</label>
               <input type="datepicker" id="datepicker" name="due_date" class="form-control">
            </div>  


             <div class="form-group">
               <label for="exampleInputAssignToTitle">Assign To</label>
                <select name="assign_project_to" id="assign_project_to" class="form-control">
                  <option value="">Assign A Project</option>
                           @foreach ($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                           @endforeach
                     </select>
              </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create</button>
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


