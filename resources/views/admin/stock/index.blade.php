@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="height:fit-content">
                <div class="header">
                    <div class="col-md-12">
                        <h3 class="text-center black">Stock</h3>
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
                                <a href="{{route('event.view')}}" class="black">Create Stock</a> 
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