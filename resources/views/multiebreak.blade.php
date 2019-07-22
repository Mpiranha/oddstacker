@extends('layouts.layout')

@section('page')
<div class="container-fluid px-0 scroll-y bg-land">
    
    <div class="light-shade">
        <main-nav title="STACK SHELL" :user="{{ Auth::user() }}" 
            :wallet="{{ Auth::user()->wallet }}">
        </main-nav>

        <div class="px-3">
            <stock-nav left-content="H-2-H" center-content="DOUBLE UP" right-content="PREMIUM"></stock-nav>
            <stack-box></stack-box>

            <div class="row mt-2">
                <div class="col-12">
                    <div class="d-flex text-light justify-content-center">
                        <p class="f-0-9 mb-0 bold-1">SELECT SIX PREDICTIONS AS TIE BREAKER</p>
                            <img class="info-box ml-1" src="/images/info-icon.png" />
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


            <div class="shell-box border-curve px-1 pt-0 pb-3 mt-1">
                
                <tie-breaker-box></tie-breaker-box>

                <tie-breaker-box></tie-breaker-box>

                <tie-breaker-box></tie-breaker-box>
            </div>

            <div class="row mt-2">
                <div class="col-12 text-center">
                    <button class="btn w-75 sexy-btn" disabled="disabled">PLAY WITH ₦1,000</button>
                    <br />
                    <small class="text-light">Submit Your Stack Of Odds</small>
                </div>
            </div>
        </div>
    </div>
    <footer-comp></footer-comp>
</div>


@endsection