@extends('layouts.layout')

@section('page')
    <div class="container-fluid full-height log-rg-bg clear-padding">
        <div class="shades">
            <odd-header></odd-header>

            <form action="#" class="ml-4 mr-4 more-mt">
                
            <div class="form-group white-text">
                <label for="username">Username</label>
                <input  class="form-control" type="text" id="username" placeholder="bobrisky514" value="">
            </div>

            <div class="form-group white-text">
                <label for="pwd">Password</label>
                <input  class="form-control" type="password" id="pwd" placeholder="" value="">
            </div>

                <div class="form-group text-right">
                    <a href="#">Forgot password</a>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>

            <div class="row text-center mt-5">
                <div class="col-12">
                    <h6 class="white-text">Don't have an account? <a class="signup-link" href="/register">Create One Now</a></h6>
                </div>
            </div>
        </div> 
    </div>
@endsection
