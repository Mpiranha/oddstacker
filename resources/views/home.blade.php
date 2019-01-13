@extends('layouts.layout')

@section('page')
    <div class="container-fluid m-0 p-0 h-100 bg-home">
        <main-nav title="STACK LOBBY"></main-nav>
        <div class="little-shade">
            <div class="row m-0 mt-2 bg-purple p-2 cal-font">
                <div class="col-2">
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                </div>
                <div class="col-8 text-center">
                    <i class="far fa-calendar-alt"></i> 05 June 2018
                </div>
                <div class="col-2">
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>

            <stack-nav class="mt-2"></stack-nav>

            <div class="d-flex">
                <div class=" cus-bg-black p-2 flex-grow-1 mr-1">
                    <i class="far fa-futbol mr-1"></i> Football
                </div>
                <div id="filter" class="cus-bg-black p-2">
                    <i class="fas fa-sliders-h"></i>
                </div>
            </div>

            <!-- Filter Bar   -->
            <div id="filter-bar">
                <button type="button" class="close-filter text-light" id="close-filter" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>

                <input type="text" class="form-control" id="search-box" aria-describedby="searchHelp" placeholder="Search">

                <div class="filter-cat mt-5">
                    <h1 class="filter-headers">FILTER BY CATEGORY</h1>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">HEAD tO HEAD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">DOUBLE UP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">PREMIUM</a>
                        </li>
                    </ul>
                </div>
                

                <div class="filter-type mt-5">
                    <h1 class="filter-headers">FILTER BY TYPE</h1>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">League</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Both Teams To Score</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Over 2.5</a>
                        </li>
                    </ul>
                </div>
            </div>
            

            <stack-box></stack-box>
            <stack-box></stack-box>
            <stack-box></stack-box>
            <stack-box></stack-box>
            <stack-box></stack-box>
        </div>
    </diV>
@endsection

