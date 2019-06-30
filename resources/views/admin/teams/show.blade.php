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
                            <th>S/N</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th># of Teams</th>
                            </thead>
                            <tbody>
                            @if (count($sports) > 0)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($sports as $sport)
                                    <tr>
                                        <td>{{ ++$count }}</td>
                                        <td>
                                            <img src="{{ $sport->logo }}" class="img-circle" height="35px"
                                                 alt="{{ $sport->name }} image"/>
                                        </td>
                                        <td>
                                            <a href="{{route('team.view', [$sport->id])}}">{{$sport->name}}</a>
                                        </td>
                                        <td>
                                            {{$sport->count_teams}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="100%" class="text-center">There are no sports in the catalog</td>
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