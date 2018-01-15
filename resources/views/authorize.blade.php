@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Authorize</h3>
            </div>
            <div class="card-body">
                <lead>To use Anvil you need to link your Anvil account to your source control</lead>
                <br>
                <small>
                    Don't worry, Anvil only requests access to your repos and commit history.
                </small>
                <br>
                <a href="{{$auth_route}}">
                    <button type="button" class="btn btn-lg btn-success">
                        Link Github
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
