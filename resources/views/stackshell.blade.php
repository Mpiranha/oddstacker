@extends('layouts.layout')

@section('page')
<div class="container-fluid px-0 scroll-y bg-land">
    
    <div class="light-shade">
        <main-nav title="STACK SHELL"
        :user="{{ Auth::user() }}" :wallet="{{ Auth::user()->wallet }}">
        </main-nav>

        <div class="px-3">
            <stock-nav left-content="H-2-H" center-content="DOUBLE UP" right-content="PREMIUM"></stock-nav>
            <stack-box></stack-box>

            <div class="shell-box border-curve px-2 py-0 mt-4">
                <second-box title="Liverpool vs Fulham"></second-box>
                <new-box></new-box>
                <new-box></new-box>
                <new-box></new-box>
                <new-box></new-box>
            </div>

            <div class="row mt-2">
                <div class="col-12 text-center">
                    <button class="btn btn-success w-40 sexy-btn" disabled="disabled">PROCEED</button>
                </div>
            </div>
        </div>
    </div>
    <footer-comp></footer-comp>
</div>


@endsection