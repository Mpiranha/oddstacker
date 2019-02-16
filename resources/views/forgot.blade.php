@extends('layouts.layout')

@section('page')
    <div class="container-fluid h-100 log-rg-bg clear-padding">
        <div class="shades w-100">
            <odd-header></odd-header>

            <form action="#" class="ml-4 mr-4 more-mt">
                <div class="form-group text-light">
                        <label for="username">Username</label>
                        <input  class="form-control" type="text" id="username" placeholder="bobrisky514" value="">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>

            <div class="row text-center more-mt">
                <div class="col-12">
                    <h6 class="text-light">Don't have an account? <a class="signup-link" href="/register">Create One Now</a></h6>
                </div>
            </div>
        </div>
        <footer-comp></footer-comp>
    </div>
@endsection