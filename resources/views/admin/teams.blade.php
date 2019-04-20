@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-info btn-fill" 
                            data-toggle="modal" data-target="#exampleModalCenter">
                            ADD NEW TEAM
                        </button>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <form action="" method="GET">
                                <input type="text" class="form-control" name="user" 
                                placeholder="Search" value="{{ \request('user') }}">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th class="text-center">S/N</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @if (count($teams) > 0)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($teams as $team)
                                    <tr>
                                        <td class="text-center">{{ ++$count }}</td>
                                        <td class="text-center">{{ $team->name }}</td>
                                        <td class="text-center">
                                            <img src="{{ $team->logo }}" height="30px" alt="{{ $team->name }} image"/>
                                        </td>
                                        <td class="text-center">
                                            {{ $team->type }}
                                        </td>
                                        <td class="text-center">
                                            <span><i class="fa fa-trash"></i></span>
                                            <span><i class="fa fa-edit"></i></span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="100%" class="text-center">NO TEAMS AVAILABLE</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $teams->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection