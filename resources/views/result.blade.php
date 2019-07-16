@extends('layouts.layout')

@section('page')

<div class="container-fluid h-100 pr-0 pl-0 scroll-y bg-land">

    <div class="little-shade">
        <main-nav title="RESULTS"></main-nav>
        <div class="px-3">

            <stock-nav left-content="STOCK" center-content="ALL STOCK" right-content="WINNERS"></stock-nav>

            <stack-box></stack-box>

            <div class="d-flex justify-content-center mt-3 px-4">
                <div class="flex-fill slight-round-bord px-3 pt-1 result-box">
                    <div class="d-flex justify-content-between">
                        <h6 class="bold-1 text-white">POSITION</h6>
                        <h6 class="pr-3 bold-1 text-white">WON (NGN)</h6>
                        <h6 class="bold-1 text-white">ODDS</h6>
                    </div>

                    <div class="d-flex justify-content-between">
                        <h6 class="bold-1 text-light f-1">5/400</h6>
                        <h6 class="bold-1 amount-text px-4 text-light f-1">2,000</h6>
                        <h6 class="bold-1 text-light f-1">41.22</h6>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 px-5">
                    <div class="d-flex">                    
                        <div class="box-radius px-3 d-flex justify-content-between f-0-6">
                            <div class="text-yellow">
                                <i class="fas fa-star mt-1"></i><span>(1)</span><span class="ml-2 text-light">3.54</span>
                            </div>

                            <div class="text-yellow">
                                <span class="mr-2 text-light">3.54</span><i class="fas fa-star mt-1"></i><span>(2)</span>
                            </div>
                        </div>
                        <img class="info-box ml-1 mt-3" src="/images/info-icon.png" />
                    </div>
                </div>
            </div>

            <div class="modal-box h-100 shades fixed-bottom p-4">
                <button type="button" class="close-modal text-light" id="close-modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="modal-content">
                    Lorem Ipsum Dulum lorem
                    Lorem Ipsum Dulum lorem
                    Lorem Ipsum Dulum lorem
                    Lorem Ipsum Dulum lorem
                    Lorem Ipsum Dulum lorem
                    Lorem Ipsum Dulum lorem
                    Lorem Ipsum Dulum lorem
                    Lorem Ipsum Dulum lorem
                    Lorem Ipsum Dulum lorem
                    Lorem Ipsum Dulum lorem
                </div>
            </div>

            <leaderboard-entry></leaderboard-entry>

        </div>

    </div>
    <footer-comp></footer-comp>


</div>

@endsection