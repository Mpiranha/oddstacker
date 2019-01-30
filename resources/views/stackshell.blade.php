@extends('layouts.layout')

@section('page')
<div class="container-fluid">
    <div class="shades">
       <main-nav title="STACK SHELL"></main-nav>
       
        <div class="container">
            <stock-nav left-content="H-2-H" center-content="DOUBLE UP" right-content="PREMIUM"></stock-nav>
            <stack-box></stack-box>

            <second-box title="Liverpool vs Fulham"></second-box>
            <new-box></new-box>
            <new-box></new-box>
            <new-box></new-box>
            <new-box></new-box>
        </div>
    </div>
    <footer-comp></footer-comp>
</div>


@endsection