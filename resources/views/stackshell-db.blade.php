@extends('layouts.layout')

@section('page')
<div class="container-fluid px-0 scroll-y bg-land">
    <div class="light-shade">
        <main-nav title="STACK LOBBY"
        :user="{{ Auth::user() }}" :wallet="{{ Auth::user()->wallet }}">
        </main-nav>

        <div class="px-3">
            <stack-box :stock="{{ $stock }}"></stack-box>
            <stock-shell :predictions="{{$eventPredictions}}" :stock="{{$stock}}"></stock-shell>
        </div>
    </div>
    <footer-comp></footer-comp>
</div>
@endsection