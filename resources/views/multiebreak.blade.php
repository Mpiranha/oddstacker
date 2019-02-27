@extends('layouts.layout')

@section('page')
<div class="container-fluid px-0 scroll-y bg-land">
    
    <div class="light-shade">
        <main-nav title="STACK SHELL"></main-nav>

        <div class="px-3">
            <stock-nav left-content="H-2-H" center-content="DOUBLE UP" right-content="PREMIUM"></stock-nav>
            <stack-box></stack-box>

            <div class="row mt-2">
                <div class="col-12">
                    <div class="d-flex text-light justify-content-center">
                        <p class="f-0-6 mb-0 bold-1 pos-relative">SELECT SIX PREDICTIONS AS TIE BREAKER
                            <span class="info-box f-0-6">
                                <i class="fas fa-info text-light"></i>
                            </span>
                        </p>

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


            <div class="shell-box border-curve px-1 pt-0 pb-3 mt-4">
                
            <tie-breaker-box></tie-breaker-box>

            <tie-breaker-box></tie-breaker-box>

            <tie-breaker-box></tie-breaker-box>
            </div>
        </div>
    </div>
    <footer-comp></footer-comp>
</div>


@endsection