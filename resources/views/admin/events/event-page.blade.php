@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="height:fit-content">
                <div class="header text-center">
                    <button class="btn btn-sm btn-primary"
                    data-toggle="modal" data-target="#predition">add prediction</button>
                    <p class="black">{{$competition->name}} - {{$sport->name}}</p>
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
<prediction-view :predictions="{{$predictions}}" :event_id="{{$event->id}}"
    :event_prediction="{{$event_prediction}}"></prediction-view>
@endsection