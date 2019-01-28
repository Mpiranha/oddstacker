@extends('layouts.layout')

@section('page')
    <div class="container-fluid h-100 log-rg-bg clear-padding">
        <div class="shades h-100">
            <odd-header></odd-header>



            <form id="login-form" action="#" class="ml-4 mr-4 extra-mt" method="POST">
                
            <div class="col-12 messages"></div>
            <div class="form-group white-text">
                <label for="username">Username</label>
                <input  class="form-control"
                 type="text" id="username"
                 placeholder="bobrisky514" 
                 pattern=".{3,}"
                 value="" required>
            </div>

            <div class="form-group white-text">
                <label for="pwd">Password</label>
                <input  class="form-control"
                 type="password"
                 id="pwd"
                 placeholder=""
                 value="" required>
            </div>

                <div class="form-group text-right">
                    <a href="#">Forgot password</a>
                </div>

                <button id="login-btn" type="submit" class="btn btn-primary btn-block">Login</button>
            </form>

            <div class="row text-center mt-5">
                <div class="col-12">
                    <h6 class="white-text">Don't have an account? <a class="signup-link" href="/register">Create One Now</a></h6>
                </div>
            </div>
        </div> 
        <footer-comp></footer-comp>
    </div>
@endsection
