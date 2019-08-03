@extends('layouts.layout')

@section('page')
    <div class="container bg-land px-0">
        <div class="light-shade">

            <main-nav title="TOKEN"></main-nav>

            <div class="px-2">

                <div class="row mt-4">
                    <div class="col-12">
                        <ul class="ref-nav nav nav-tabs justify-content-between b-0 mt-2 mx-3">
                            <li id="card-nav" class="ref-tab text-center"><a class="text-light text-uppercase active" data-toggle="tab" href="#usernames">MY TOKEN</a></li>
                            <li id="bank-nav" class="ref-tab text-center"><a class="text-light text-uppercase" data-toggle="tab" href="#tips">WHAT IS TOKEN?</a></li>
                        </ul>

                        <div class="tab-content mt-4">
                            <div id="usernames" class="tab-pane fade in active show">
                                <div class="ref-level-box">
                                    <div class="ref-current-lvl-box">
                                        FREE PLAY TOKEN
                                    </div>
                                    <table class="table ref-table text-light">
                                        <thead>
                                            <tr class="h2 text-center">
                                                <th scope="col" class="border-0 f-1">NO.</th>
                                                <th scope="col" class="border-0 f-1">AMOUNT</th>
                                                <th scope="col" class="border-0 f-1">DURATION</th>
                                                <th scope="col" class="border-0 f-1">EXPIRY</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr class="f-0-9 text-center">
                                                <th class="border-0" scope="row">1</th>
                                                <td class="border-0">#1000</td>
                                                <td class="border-0">1 Day</td>
                                                <td class="border-0">3 hrs</td>
                                            </tr>
                                            <tr class="f-0-9 text-center">
                                                <th class="border-0" scope="row">1</th>
                                                <td class="border-0">#5000</td>
                                                <td class="border-0">7 Days</td>
                                                <td class="border-0">5 Years</td>
                                            </tr>
                                            <tr class="f-0-9 text-center">
                                                <th class="border-0" scope="row">2</th>
                                                <td class="border-0">#500</td>
                                                <td class="border-0">3 Days</td>
                                                <td class="border-0">5 Hrs</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    
                                </div>

                                <div class="ref-level-box mt-5 mb-4">
                                    <div class="ref-current-lvl-box">
                                        PREMIUM TOKEN
                                    </div>
                                    <table class="table ref-table text-light">
                                        <thead>
                                            <tr class="h2 text-center">
                                                <th scope="col" class="border-0 f-1">NO.</th>
                                                <th scope="col" class="border-0 f-1">%</th>
                                                <th scope="col" class="border-0 f-1">DURATION</th>
                                                <th scope="col" class="border-0 f-1">EXPIRY</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr class="f-0-9 text-center">
                                                <th class="border-0" scope="row">1</th>
                                                <td class="border-0">10</td>
                                                <td class="border-0">4Days</td>
                                                <td class="border-0">5hrs</td>
                                            </tr>
                                            <tr class="f-0-9 text-center">
                                                <th class="border-0" scope="row">2</th>
                                                <td class="border-0">20</td>
                                                <td class="border-0">3Days</td>
                                                <td class="border-0">2Days 5hrs</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    
                                </div>
                                
                                
                            </div>

                            <div id="tips" class="tab-pane fade">
                                <div class="desc-box mb-5">
                                    Hello how are you
                                    Hello how are you
                                    Hello how are you
                                    Hello how are you
                                    Hello how are you
                                    Hello how are you
                                    Hello how are you
                                    Hello how are you
                                    Hello how are you
                                    Hello how are you
                                    Hello how are you
                                    Hello how are you
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer-comp></footer-comp>
        </div>
    </div>
@endsection

