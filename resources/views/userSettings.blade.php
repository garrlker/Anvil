@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Settings</h3>
            </div>
            <div class="card-body">
                <div class="col">
                    <form class="form-group">
                        <label>Theme:</label>
                        <br>
                        <select class="custom-select-sm">
                            <option value="0">Light</option>
                            <option value="1">Dark</option>
                        </select>
                        <br>
                        <label>2FA:</label>
                        <br>
                        <select class="custom-select-sm">
                            <option value="0">Disabled</option>
                            <option value="1">Enabled</option>
                        </select>
                        <br>
                        <label>Github Access Token</label>
                        <br>
                        <input class="input-group-text" disabled>
                        <br>
                        <label>BitBucket Access Token</label>
                        <br>
                        <input class="input-group-text" disabled>
                        <br>
                        <label>GitLab Access Token</label>
                        <br>
                        <input class="input-group-text" disabled>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
