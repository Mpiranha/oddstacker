@extends('layouts.layout')

@section('page')
<div class="container-fluid px-0 scroll-y bg-land">
    
    <div class="light-shade">
        <main-nav title="STACK SHELL"></main-nav>

        <div class="px-3">
            <stock-nav left-content="H-2-H" center-content="DOUBLE UP" right-content="PREMIUM"></stock-nav>
            <stack-box></stack-box>

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