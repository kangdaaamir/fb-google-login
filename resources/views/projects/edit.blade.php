@extends('main')
@section('title', 'Project Editing')
@section('content')

<div class="content-wrapper">


       
 
    <!-- Main content -->
    <section class="content">
      @include('partials.validate')


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{$project->title}} Editing</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
        <form action="{{route('projects.update', $project->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
              <div class="box-body">
              <div class="form-group">
                   <label for="exampleInputProjectTitle">Project Title</label>
                 <input type="text" name="title" class="form-control" id="title" value="{{$project->title}}" placeholder="Enter Project Title">
                </div>

                <div class="form-group">
                   <label for="exampleInputProjectDescription">Project Description</label>
                 <input type="text" name="description" class="form-control" id="description" value="{{$project->description}}" placeholder="Enter Project Title">
                </div>

                <div class="form-group">
                              @if($project->image)
              <img id="original" src="{{ asset('project/'.$project->image) }}" height="70" width="70">
              @endif
              <input type="file" name="image" class="form-control" placeholder="">
              <span class="text-danger">{{ $errors->first('image') }}</span>
            </div>

       
           <div class="form-group">
                <label for="exampleInputDueDate">Due Date</label>
               <input type="text" id="datepicker" value="{{$project->due_date}}" name="due_date" class="form-control">
            </div>  

            
             <div class="form-group">
               <label for="exampleInputAssignerTo">Assigned To</label>
                <select name="assign_project_to" id="assign_project_to" class="form-control">
                  <option value="">Assigned To</option>
                           @foreach ($users as $user)
                                  <option value="{{ $user->id }}" {{$project->assign_project_to == $user->id ? "selected" : "" }}>{{ $user->name }}</option>
                           @endforeach
                     </select>
              </div>
        

          </div>  
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