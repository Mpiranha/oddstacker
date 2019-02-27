@extends('layouts.layout')

@section('page')
<div class="container-fluid m-0 p-0 h-100 scroll-y bg-home">

    <div class="little-shade">
        <main-nav title="STACK LOBBY"></main-nav>
        <div class="px-3">
            <date-picker></date-picker>

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
            <div id="filter-bar" class="scroll-y">
                <button type="button" class="close-filter text-light" id="close-filter" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <input type="text" class="form-control" id="search-box" aria-describedby="searchHelp" placeholder="Search Stock Lobby">

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
                    <h1 class="filter-headers">FILTER BY SPORT</h1>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">FOOTBALL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">TENNIS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ICE HOCKEY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">BASKET BALL</a>
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
    </div>
    <footer-comp></footer-comp>
</diV>
@endsection