@extends('main')
@section('title', 'Projects')
@section('content')

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
    @include('partials.validate')
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Projects</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th>Project Name</th>
                    <th>Project Description</th>
                    <th>Due Date</th>
                    <th>Assign Project To</th>
                    <th>Assign By</th>
                    <th>Created At</th>
                    <th>Updated At</th>

                    
                </tr>
                </thead>
                <tbody>

                @foreach($projects as $project)
                    <tr>
                    <td>{{$project->title}}</td>
                    <td>{{$project->description}}</td>
                     <?php $formattedDate = date("d-m-Y", strtotime($project->due_date)); ?>
                    <td>{{$formattedDate}}</td>
                    <td>{{$project->name}}</td>
                    <td>{{$project->assign_by}}</td>
                 
                    <td>{{$project->created_at}}</td>
                    <td>{{$project->updated_at}}</td>
                    
                    </tr>
                @endforeach

                
                </tfoot>
              </table>
            </div>
          <!-- /.box -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection
@push('style')
      <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/admin')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush
@push('scripts')
<!-- DataTables -->
<script src="{{asset('assets/admin')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/admin')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endpush