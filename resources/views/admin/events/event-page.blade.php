@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="height:fit-content">
                <div class="header text-center">
                    <p class="black">{{$league->name}} - {{$sport->name}}</p>
                </div>
            </div>
            <div class="row mb-4" style="margin-bottom:15px">
                <div class="col-md-6 text-center">
                    <img src="{{ $event->teamA->logo }}" height="30px" alt="{{ $event->teamA->name }} image"/>
                    {{$event->teamA->name}}
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ $event->teamB->logo }}" height="30px" alt="{{ $event->teamB->name }} image"/>
                    {{$event->teamB->name}}
                </div>
            </div>
            <div class="card mt-5" style="height:fit-content">
            <event-prediction :event_prediction="{{$event_prediction}}"></event-prediction>
            </div>

        </div>
    </div>
</div>
@endsection
@section('out')

@endsection