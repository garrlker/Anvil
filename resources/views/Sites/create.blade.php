@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 64px">
        <div class="card">
            <div class="card-header text-center">
                <h4>
                    Create Site
                </h4>
            </div>
            <div class="card-body">
                <form method="Post" class="form-group">
                    <label>Repository</label>
                    <select class="form-control">
                        @foreach($repositories as $repository)
                            <option value="{{$repository->id}}">{{$repository->name}}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>
@endsection
