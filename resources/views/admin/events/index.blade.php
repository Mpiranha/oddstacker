@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-12">
                        <h3 class="text-center black">Events</h3>
                    </div>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th class=""></th>
                            <th class=""></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                <a href="{{route('event.view')}}" class="black">Create Event</a> 
                                </td>
                                <td class="">
                                <a href="#" class="black">All Events</a> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection