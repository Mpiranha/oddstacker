@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="height:fit-content">
                <div class="header">
                    <div class="col-md-12">
                        <h3 class="text-center black">League</h3>
                    </div>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th class="text-center">Name</th>
                        </thead>
                        <tbody>
                            @if (count($leagues) > 0)
                                
                                @foreach ($leagues as $league)
                                    <tr>
                                        <td class="text-center">
                                        <a href="{{route('event.league_view', [$league->id])}}">{{$league->name}}</a>
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