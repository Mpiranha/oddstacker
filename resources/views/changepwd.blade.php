@extends('layouts.layout')

@section('page')
<div class="container-fluid px-0 bg-land">

        <div class="shades h-100">
                <main-nav title="PROFILE"
        :user="{{ Auth::user() }}" :wallet="{{ Auth::user()->wallet }}">
        </main-nav>

            @include('partials.success')
            @include('partials.error')
                @if ($errors->any())
                        <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                        </div>
                @endif
                <div class="container pb-5 mt-5" >
                        <form class="prof-form" action="{{ route('change_password', Auth::id()) }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                        <label for="UserId">Current Password</label>
                                        <input type="password" class="form-control" id="old-pwd" name="old_pass" required placeholder="old password" aria-describedby="current password">
                                </div>
                                <div class="form-group">
                                        <label for="Username">New Password</label>
                                        <input type="password" class="form-control" required id="new-pwd" name="password" placeholder="new password" aria-describedby="new password">
                                </div>
                                <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" class="form-control" required id="con-new-pwd" name="password_confirmation" placeholder="confirm password" aria-describedby="confirm password">
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