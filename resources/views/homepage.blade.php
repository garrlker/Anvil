@extends('layouts.app')
<style>
    .jumbotron {
        background-image: url(https://dl2.pushbulletusercontent.com/VAd8RYv9vgfKNN42Wv05aLEPhpQyZz8L/IMG_20170930_183226~2.jpg);
        background-size: 100% 100%;
        height: 100%;
    }
</style>
@section('content')
    <div class="col-md-9 text-center mx-auto">
        <div class="jumbotron ">
            <h1 class="display-4 text-white">Anvil</h1>
            <p class="lead text-white">Free tool to deploy PHP sites</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn More</a>
        </div>
        <div class="row">
            <div class="col">
                    <p class="lead text-white">Use webhooks, or the dashboard, to deploy your site's repo directly to your server</p>
            </div>
            <div class="col">
                    <p class="lead text-white">Assigned pre-dep and post-dep scripts to run actions when you deploy</p>
            </div>
            <div class="col">
                    <p class="lead text-white">Integrate your project directly into slack or discord for notifications</p>
            </div>
        </div>
    </div>
@endsection
