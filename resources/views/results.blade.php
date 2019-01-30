@extends('layouts.layout')

@section('page')

<div class="container-fluid h-100 pr-0 pl-0 scroll-y bg-land">
    
    <div class="shades">
        <main-nav title="RESULTS"></main-nav>
        <div class="px-3">
            
            <stock-nav left-content="STOCK" center-content="ALL STOCK" right-content="WINNERS"></stock-nav>
            <date-picker></date-picker>

            <stack-nav class="mt-2"></stack-nav>

            <stack-box-new></stack-box-new>
            <stack-box-new></stack-box-new>
            <stack-box-new></stack-box-new>
            <stack-box-new></stack-box-new>
            <stack-box-new></stack-box-new>
        </div>

        
    </div>
    <footer-comp></footer-comp>
</div>

@endsection