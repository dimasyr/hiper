@extends('layout.loginpar')

@section('title', 'Hiper')

@section('signup')
    
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
                            <label>Nama</label>
                            <input type="email" class="form-control" placeholder="Nama User">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1">
                                    <option value="" label="pilih.."></option>
                                    <option value="United States">Administrator</option>
                                    <option value="United Kingdom">User</option>
                                </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="{{ route('login')}}"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection