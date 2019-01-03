@extends('layouts.layout')

@section('page')
    <div class="container-fluid full-height log-rg-bg rg-bg clear-padding">
        <div class="shades">
            <odd-header></odd-header>

            <form action="#" class="ml-4 mr-4">

                <div class="form-group white-text">
                    <label for="tel">Phone Number</label>
                    <input  class="form-control" type="tel" id="tell" placeholder="+2348000000000" value="">
                </div>

                <div class="form-group white-text">
                    <label for="username">Username</label>
                    <input  class="form-control" type="text" id="username" placeholder="bobrisky514" value="">
                </div>

                <div class="form-group white-text">
                    <label for="pwd">Password</label>
                    <input  class="form-control" type="password" id="pwd" placeholder="" value="">
                </div>

                <div class="form-group white-text">
                    <label for="con-pwd">Confirm Password</label>
                    <input  class="form-control" type="password" id="con-pwd" placeholder="" value="">
                </div>


                <div class="form-group form-check">
                    <label class="form-check-label  white-text">
                        <input class="form-check-input" type="checkbox"> I confirm that i am over 18 Years and agree to Terms & Privacy Policy
                    </label>
                </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>

            <div class="row text-center more-mt">
                <div class="col-12">
                    <h6 class="white-text">Already Have an Account? <a class="login-link" href="/login">Log In</a></h6>
                </div>
            </div>
        </div>
    </div>
@endsection
