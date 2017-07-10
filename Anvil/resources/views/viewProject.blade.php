@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <a onclick="deploy()" class="btn btn-warning btn pull-right">Deploy</a>
                <h3 class="panel-title">{{$project->name}}</h3>
                <h3 class="panel-title">Current Status: {{$project->command}}</h3>
            </div>

            <ul class="list-group">
                <h6> Description: </h6>
                <li class="list-group-item">{{$project->description}}</li>
                <h6>Repository: </h6>
                <li class="list-group-item">{{$project->repo_url}}</li>
                <h6>Total Deployments: </h6>
                <li class="list-group-item">{{$project->number_of_pushes}}</li>

            </ul>
        </div>
    </div>
    <script>
        function deploy(){
            console.log("sent");
            var http = new XMLHttpRequest();
            http.open("POST",'/api/deploy/{{$project->uuid}}',true);
            http.send();
        }
    </script>
@endsection
