@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Success!</h3>
                <div class="col">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:100%"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <i class="fas fa-user fa-2x rounded-circle bg-light"></i>
                        </div>
                        <div class="col">
                            <i class="fab fa-github fa-2x rounded-circle bg-light"></i>
                        </div>
                        <div class="col">
                            <i class="fas fa-check-circle fa-2x rounded-circle bg-light"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="text-center">
                    Congrats! You are now ready to deploy using Anvil
                    <br>
                    <small class="text-muted">
                    Enjoy!
                    </small>
                </p>
                <br>
                <a href="{{route('dashboard')}}">
                <button class="btn btn-lg btn-success float-right">
                    Dashboard
                </button>
                </a>
            </div>
        </div>
    </div>
@endsection
