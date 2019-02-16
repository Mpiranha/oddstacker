@extends('layouts.layout')

@section('page')
    <div class="container-fluid h-100 scroll-y log-rg-bg rg-bg clear-padding">
        <div class="shades">
            <odd-header></odd-header>

            <form id="reg-form" action="#" class="ml-4 mr-4"action="#" method="post">
                <div class="form-group text-light">
                    <label for="tel">Phone Number *</label>
                    <input class="form-control" type="tel" id="tel" placeholder="+2348000000000" value="">
                    <p id="tel-desc" class="text-light ">
                        Enter your number in the format 08100000000
                    </p>
                </div>

                <div class="form-group text-light">
                    <label for="username">Username *</label>
                    <input  class="form-control" type="text" id="username" placeholder="bobrisky514" value="">
                    <p id="username-desc" class="text-light">
                        Username must contain letters and numbers only, minimum 3 characters
                    </p>
                </div>

                <div class="form-group text-light">
                    <label for="pwd">Password *</label>
                    <input  class="form-control" type="password" id="pwd" placeholder="" value="">
                    <p id="pass-desc" class="text-light">
                        password must contain letters and atleast one digit, minimum of 8 characters
                    </p>
                </div>

                <div class="form-group text-light">
                    <label for="con-pwd">Confirm Password *</label>
                    <input  class="form-control" type="password" id="con-pwd" placeholder="" value="">
                    <p id="con-desc" class="text-light">
                        Must match password
                    </p>
                </div>


                <div class="form-group form-check">
                    <label for="agree-terms" class="form-check-label  text-light">
                        <input class="form-check-input" type="checkbox" id="agree-terms"> I confirm that i am over 18 Years and agree to Terms & Privacy Policy
                    </label>
                </div>
                    <button id="reg-submit" type="submit" class="btn btn-primary btn-block">Register</button>
            </form>

            <div class="row text-center more-mt">
                <div class="col-12">
                    <h6 class="text-light">Already Have an Account? <a class="login-link" href="/login">Log In</a></h6>
                </div>
            </div>
        </div>
        <footer-comp></footer-comp>
    </div>
@endsection
