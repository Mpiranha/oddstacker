@extends('layouts.layout')

@section('page')
<div class="container-fluid px-0 bg-land">

        <div class="little-shade h-100">
                <main-nav title="profile"></main-nav>
                <div class="container pb-5">
                        <form class="prof-form" action="" method="post">
                                <div class="form-group">
                                        <label for="UserId">Current Password</label>
                                        <input type="password" class="form-control" id="old-pwd" aria-describedby="current password">
                                </div>
                                <div class="form-group">
                                        <label for="Username">New Password</label>
                                        <input type="password" class="form-control" id="new-pwd" aria-describedby="new password">
                                </div>
                                <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" class="form-control" id="con-new-pwd" aria-describedby="confirm password">
                                </div>

                                <div class="d-flex justify-content-center ">
                                        <button type="submit" class="btn btn-danger text-center profile-submit-btn text-uppercase">
                                                Save Changes
                                        </button>
                                </div>
                        </form>
                </div>
        </div>
        <footer-comp></footer-comp>
</div>

@endsection