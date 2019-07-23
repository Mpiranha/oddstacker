@extends('layouts.layout')

@section('page')
<div class="container-fluid m-0 p-0 h-100 scroll-y bg-home">

    <div class="little-shade">
        <main-nav title="STACK LOBBY"
        :user="{{ Auth::user() }}" :wallet="{{ Auth::user()->wallet }}">
        </main-nav>
        <div class="px-3">
            <stock-lobby></stock-lobby>
        </div>
    </div>
    <footer-comp></footer-comp>
</div>
@endsection