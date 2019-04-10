@extends('layouts.layout')

@section('page')
<div class="container-fluid px-0 scroll-y bg-land">
    
    <div class="light-shade">
        <main-nav title="STACK SHELL"></main-nav>

        <div class="px-3">
            <stack-box></stack-box>

            <div class="d-flex justify-content-between text-white">
                <p>Min: <span>1.21</span></p>

                <div class="d-flex flex-column">
                    <p class="mb-0 text-yellow">(P) <span class="text-light">59.99</span></p>
                    <p class="mb-0 text-red">(H) <span class="text-light">4499</span></p>
                    <p class="mb-0 text-blue">(D) <span class="text-light">32.99</span></p>
                </div>

                <p>Max: <span>9.99</span></p>

            </div>

            <div class="shell-box border-curve px-1 pt-0 pb-3 mt-4">
                
                <db-stackshell-box></db-stackshell-box>

                <db-stackshell-box></db-stackshell-box>

                <db-stackshell-box></db-stackshell-box>
            </div>

            <div class="row mt-2">
                <div class="col-12 text-center">
                    <button class="btn btn-success w-40 sexy-btn" disabled="disabled">PLAY #400</button>
                </div>
            </div>

        </div>

    </div>
    <footer-comp></footer-comp>
</div>


@endsection