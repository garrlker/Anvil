@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#projectsList" data-toggle="tab">Projects</a></li>
                        <li><a href="#addProject" data-toggle="tab">Add Project</a></li>
                        <li><a href="#tab3default" data-toggle="tab">Foo</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="projectsList">
                            <ul class="list-group">
                                @foreach($projects as $project)

                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    {{$project->name}}
                                                    <div class="btn-group pull-right">
                                                        <a href="#" class="btn btn-info btn-sm">View</a>
                                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </h3>
                                                <h6>
                                                    {{$project->description}}
                                                </h6>
                                            </div>
                                        </div>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="addProject">
                            <form id= "addProj" class="form-horizontal" action="{{ route('AddProject') }}" method="post">
                                {{csrf_field()}}
                                <fieldset>
                                    <legend>Add Project</legend>
                                    <div class="form-group">
                                        <label for="inputName" class="col-lg-2 control-label">Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="projName" id="inputName" placeholder="Name" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUrl" class="col-lg-2 control-label">Repo URL</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="repoURL" id="inputUrl" placeholder="Url" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-lg-2 control-label">Description</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" rows="3" name="description" id="description" maxlength="140" form="addProj"></textarea>
                                            <span class="help-block">A short description about your project.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <button type="reset" class="btn btn-default">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
