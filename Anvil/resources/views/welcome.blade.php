@extends('layouts.header')
@section('content')

<div class="container">
    <div class="jumbotron">
        <h1>Anvil</h1>
        <p>Bare minimum dev ops when you need them</p>
        <ul class="list-group">
            <li class="list-group-item">
                <h5>To install, run </h5><pre> curl anv.il/client > anvil_client.js</pre>
                <h5> in any directory you wish and make sure NodeJS is installed</h5>
            </li>
            <li class="list-group-item">
                <h5>Now, in the same directory, run </h5><pre>npm install -g request</pre>
            </li>
            <li class="list-group-item">
                <h5>Create an account and add a project</h5>
            </li>
            <li class="list-group-item">
                <h5>In anvil_client.js, set the projectUUID variable to your project's UUID from the dashboard</h5>
            </li>
            <li class="list-group-item">
                <h5>Run the client in NodeJs, then click on deploy</h5>
            </li>
            <li class="list-group-item">
                <h5 class="text-success">Success! You've deployed a project with Anvil!</h5>
            </li>
        </ul>
    </div>
</div>

@endsection