<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Login')

<!-- Head -->
@include('app-layout.head')

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo mb-5 mt-4">
                    <a href="login">
                        <h2><b style="color: #007bff">Login</b> SCM 2</h2>
                    </a>
                </div>
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('postlogin') }}" method="post">
                    {{ csrf_field() }}

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Log in</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="dropdown-divider mb-3"></div>
                <p class="mb-0" style="text-align: center">
                    <a href="register" class="text-center">Create an Account!</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- script -->
    @include('app-layout.script')
</body>

</html>
