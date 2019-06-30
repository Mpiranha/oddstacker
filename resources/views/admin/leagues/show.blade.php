@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="height:fit-content">
                    <div class="header">
                        <div class="col-md-12">
                            <h3 class="text-center">Sport</h3>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>S/N</th>
                            <th>Image</th>
                            <th>Name</th>
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
                                            <img src="{{ $sport->image }}" height="30px"
                                                 alt="{{ $sport->name }} image"/>
                                        </td>
                                        <td>
                                            <a href="{{route('league.view', [$sport->id])}}">{{$sport->name}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="100%" class="text-center">No Sport available. please make sure sports have been created before jumping here.</td>
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