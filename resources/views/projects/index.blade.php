@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <button type="button" class="btn btn-info add-project" data-toggle="modal" data-target="#myModal">Add new Project</button>
    @if(count($projects) > 0)
        @foreach($projects->chunk(3) as $project_data)
        <div class="row">
            <div class="col-md-12">
                @foreach($project_data as $data)
                    <div class="col-md-4 rounded-project">
                        <a href="javascript:void(0);">
                            <h3 class="pull-left">{!! $data->project_name; !!}</h3>
                        </a>
                        <div class="pull-right">
                            <a href="javascript:void(0);" class="project-edit"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" class="project-delete"><i class="fa fa-times-circle"></i></a>
                        </div>
                        <a href="javascript:void(0);">
                            <div class="row">
                                <div class="col-md-12 todos-status">
                                    <p class="para">Something has been completed till now</p>
                                </div>
                            </div>
                            <div class="row  margin-top-double">
                                <div class="col-md-offset-1 col-md-3">
                                    <img src="{!! URL::asset('assets/images/circle.jpg') !!}" class="img-circle" height="80">
                                </div>
                                 <div class="col-md-3">
                                    <img src="{!! URL::asset('assets/images/circle.jpg') !!}" class="img-circle" height="80">
                                </div>
                                 <div class="col-md-3">
                                    <img src="{!! URL::asset('assets/images/circle.jpg') !!}" class="img-circle" height="80">
                                </div>
                            </div>
                        </a>
                        <div class="row  margin-top-double">
                            <div class="col-md-12 complete-status">
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                  aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                    <span class="sr-only">70% Complete</span>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endforeach
    @else
        <h1>No projects found</h1>
    @endif
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Project</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(array('url' => 'project', 'role' => 'form')) !!}
            <div class="form-group {{ $errors->has('project_name') ? ' has-error' : '' }}">
                {!! Form::text('project_name', old('project_name'), ['class' => 'form-control', 'placeholder' => 'Project Name']) !!}
                @if($errors->has('project_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('project_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::textarea('project_details', old('project_details'), ['class' => 'form-control', 'placeholder' => 'Some details about the project', 'rows' => 5]) !!}
            </div>
            {!! Form::submit('Add new Project', ['class' => 'btn btn-success']) !!}
            {!! Form::reset('Cancel', ['class' => 'btn btn-danger','data-dismiss' => 'modal']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascript')
    <script type="text/javascript">
        (function() {
            var errors = '<?php echo json_encode($errors->all()); ?>';
            if(errors.length > 2) {
                $("#myModal").modal();
            }
        })($);
    </script>
@endsection
