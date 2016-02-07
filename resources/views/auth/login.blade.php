@extends('layouts.login')


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
<p style="color:red" ><?php echo Session::get('message'); ?></p>
 
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form  method="post" action="/login">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" type="email" name="email" value="{{ old('email') }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" type="password" name="password" id="password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </br> <p align="center"><b>Or</b><p>
                                <a href="/register" class="btn btn-lg btn-success btn-block">Register</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   
@stop()