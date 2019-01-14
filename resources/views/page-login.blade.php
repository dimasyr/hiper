@extends('layout.loginpar')

@section('title', 'Hiper')

@section('login')
    
<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <a href="#"><button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

