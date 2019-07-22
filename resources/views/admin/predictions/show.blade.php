@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="height:fit-content">
                <div class="header">
                    <div class="col-md-12">
                        <h3 class="text-center">Sports</h3>
                    </div>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th class="text-center">S/N</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Image</th>
                        </thead>
                        <tbody>
                            @if (true)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($sports as $sport)
                                    <tr>
                                        <td class="text-center">{{ ++$count }}</td>
                                        <td class="text-center">
                                        <a href="{{route('prediction.view', [$sport->name, $sport->id])}}">{{$sport->name}}</a> 
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ $sport->image }}" height="30px" alt="{{ $sport->name }} image"/>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="100%" class="text-center">No set up yet </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection