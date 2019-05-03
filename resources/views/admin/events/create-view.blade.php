@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <event-create :competition="{{$competition}}"></event-create>
            </div>
        </div>
    </div>
</div>
@endsection
@section('out')
<settings-modal :countries="{{$countries}}" :leagues="{{$leagues}}"></settings-modal>
@endsection