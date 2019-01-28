@extends('layouts.layout')

@section('page')

<div class="container-fluid h-100 pr-0 pl-0 scroll-y bg-land">

    <div class="shades">
        <main-nav title="RESULTS"></main-nav>
        <div class="px-3">

            <stock-nav></stock-nav>

            <stack-box></stack-box>

            <div class="d-flex justify-content-center mt-3 px-4">
                <div class="flex-fill slight-round-bord px-3 pt-1 result-box">
                    <div class="d-flex justify-content-between">
                        <h6 class="bold-1 text-white">POSITION</h6>
                        <h6 class="pr-3 bold-1 text-white">WON (NGN)</h6>
                        <h6 class="bold-1 text-white">ODDS</h6>
                    </div>

                    <div class="d-flex justify-content-between">
                        <h6 class="bold-1 text-green f-2">5/400</h6>
                        <h6 class="bold-1 amount-text px-5 text-white f-2">2,000</h6>
                        <h6 class="bold-1 text-green f-2">41.22</h6>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="d-flex justify-content-center stack-lead-btn">
                        <a id="my-stack" class="btn end end-left bg-grey text-dark btn-stack text-uppercase active">MY STACK</a>
                        <a id="leaderboard" class="btn end end-right bg-grey text-dark btn-lead text-uppercase">LEADERBOARD</a>
                    </div>
                </div>
            </div>

            <div class="row my-3 px-3">
                <div class="col-12 border-curve pt-0">
                    <team-view-box></team-view-box>

                    <team-view-box></team-view-box>

                    <team-view-box></team-view-box>

                    <team-view-box></team-view-box>

                    <team-view-box></team-view-box>

                    <team-view-box></team-view-box>
                </div>
            </div>
        </div>
        
    </div>
    <footer-comp></footer-comp>


</div>

@endsection