@extends('layouts.layout')

@section('page')
    <div class="container-fluid h-100 scroll-y clear-padding log-rg-bg">
        <div class="shades pb-5">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <nav class="navbar navbar-expand bg-nav">
                        <a href="/" class="navbar-brand logo">ODDSTACKR</a>             
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Login</a>
                            </li>

                            <li class="nav-item">
                                <a href="/register" class="nav-link">Sign Up</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-12 col-sm-12">
                    <div class="jumbotron jumbotron-fluid text-center more-pt clear-bg white-text">
                        <div class="container">
                            <h1 class="desc-header">Play and Win With ODDSTACKR</h1> 
                            <p class="mt-4">
                                ipsum dulum ipsumipsum dulum ipsumipsum dulum ipsumipsum dulum ipsumipsum dulum ipsum
                                ipsum dulum ipsumipsum dulum ipsumipsum dulum ipsumipsum dulum ipsumipsum dulum ipsumipsum dulum ipsum
                            </p> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <a class="btn btn-primary btn-block reduce-width-inline pt-3 pb-3" href="/login">Play Now</a>
                </div>
            </div>
        </div>

        <footer-comp></footer-comp>
    </div>
@endsection

