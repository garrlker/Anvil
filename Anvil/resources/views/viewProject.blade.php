@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{$project->name}}</h3>
            </div>
            <div class="panel-body">
                {{$project->description}}
            </div>
        </div>
    </div>
@endsection
