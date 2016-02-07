@extends('layouts.login');

@section('content')

  @if (count($errors) > 0)
 
            <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                    </ul>
            </div>

@endif

@if (Session::has('success'))

 {{ Session::get('success') }}

@endif
@if (Session::has('error'))

{{ Session::get('error') }}

@endif
 
<div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Register</h3>
                    </div>
                    <div class="panel-body">
                        <form  method="post" action="/register">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" type="text" name="name" value="{{ old('name') }}" autofocus>
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" type="email" name="email" value="{{ old('email') }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Re-Password" type="password" name="password_confirmation" value="">
                                </div>
                                  
                                <button type="submit" class="btn btn-lg btn-success btn-block">Register</button>
                                <br/>
                                <a href="/login" >< Back to Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@stop