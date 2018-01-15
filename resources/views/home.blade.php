@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 64px">
        <div class="card">
            <div class="card-header text-center">
                <h4>
                    Sites
                    <a href="{{route('sites.create')}}">
                        <button class="btn btn-success float-right">
                            Add Site
                        </button>
                    </a>
                </h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    {{--<li class="list-group-item list-group-item-info">
                        asd
                    </li>--}}
                </ul>
            </div>
        </div>
    </div>
@endsection
