@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Link Source Control</h3>
                <div class="col">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:50%"></div>
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
                    To use Anvil you need to link your Anvil account to your source control
                    <br>
                    <small class="text-muted">
                        Don't worry, Anvil only requests access to your repos and commit history.
                    </small>
                </p>
                <br>
                <div class="row mx-auto">
                    <a href="{{$auth_route}}">
                        <button class="btn btn-lg btn-success">
                            <i class="fab fa-github fa-4x"></i>
                            GitHub
                        </button>
                    </a>
                </div>
                <br>
                <div class="row mx-auto">
                    <button class="btn btn-lg btn-info" disabled>
                        <i class="fab fa-bitbucket fa-4x"></i>
                        BitBucket
                    </button>
                </div>
                <br>
                <div class="row mx-auto">
                    <button class="btn btn-lg btn-warning" disabled>
                        <i class="fab fa-gitlab fa-4x"></i>
                        GitLab
                    </button>
                </div>
                <button class="btn btn-secondary float-right">
                    Skip
                </button>
            </div>
        </div>
    </div>
@endsection
