@extends('layouts.layout')

@section('page')
    <div class="container-fluid h-100 log-rg-bg scroll-y clear-padding">
        <div class="shades">
            <odd-header></odd-header>

            <form id="login-form" action="{{ route('login') }}" class="ml-4 mr-4 extra-mt" method="POST">
                {{ csrf_field() }}
                <div class="col-12 messages">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group text-light">
                    <label for="email">Email</label>
                    <input  class="form-control" value="{{ old('email') }}"
                    type="text" id="email" name="email">
                </div>

                <div class="form-group text-light">
                    <label for="pwd">Password</label>
                    <input  class="form-control"
                    type="password" name="password" id="pwd">
                </div>

                <div class="form-group text-right">
                    <a href="/forgot-password">Forgot password</a>
                </div>

                <button id="login-btn" type="submit" class="btn btn-primary btn-block">Login</button>
            </form>

            <div class="row text-center mt-5">
                <div class="col-12">
                    <h6 class="text-light">Don't have an account? <a class="signup-link" href="/register">Create One Now</a></h6>
                </div>
            </div>
        </div> 
        <footer-comp></footer-comp>
    </div>
@endsection
