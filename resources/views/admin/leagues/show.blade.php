@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="height:fit-content">
                <div class="header">
                    <div class="col-md-12">
                        <h3 class="text-center">Country</h3>
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
                            @if (count($countries) > 0)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($countries as $country)
                                    <tr>
                                        <td class="text-center">{{ ++$count }}</td>
                                        <td class="text-center">
                                        <a href="{{route('league.view', [$country->name, $country->id])}}">{{$country->name}}</a> 
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ $country->logo }}" height="30px" alt="{{ $country->name }} image"/>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="100%" class="text-center">Not set up yet </td>
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