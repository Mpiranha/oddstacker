@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="col-12 messages">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="height:fit-content">
                <div class="header">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-info btn-fill" 
                            data-toggle="modal" data-target="#add-team">
                            ADD TEAM
                        </button>
                    </div>
                    <div class="col-md-6">
                        {{-- <div class="form-group">
                            <form action="" method="GET">
                                <input type="text" class="form-control" name="user" 
                                placeholder="Search" value="{{ \request('user') }}">
                            </form>
                        </div> --}}
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
                                        <td class="text-center"><a href="#" style="color: black"
                                                onclick="
                                                    let result = confirm('Are you sure you want to delete this League?');
                                                    if (result){
                                                        let sure = confirm('really sure');
                                                        if (sure){
                                                            event.preventDefault();
                                                        document.getElementById('delete-form-{{$team->id}}').submit();
                                                        }
                                                    }"
                                                >
                                                    <i class="fa fa-trash cursor" ></i>
                                            </a>
                                            <form action="{{ route('team.delete', $team->id) }}" method="POST"
                                                style="display: none;" id="delete-form-{{$team->id}}">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    </button>
                                                </form>
                                            {{-- <span><i class="fa fa-edit"></i></span> --}}
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="modal fade" id="add-team" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">ADD NEW TEAM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('team.create', [$country_id, $sport_id, $league_id]) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Team Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Arsenal">
                    </div>
                    <div class="form-group">
                        <label>Team Logo</label>
                        <input type="text" name="logo" class="form-control" placeholder="Image URL" value="">
                    </div>
                    <div class="form-group">
                        <label for="type">Team Type</label>
                        <select class="form-control" name="type">
                            <option value="country">Country</option>
                            <option value="club" selected>Team</option>
                            <option value="single" selected>Single</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ADD TEAM</button>
                </div>
            </form>
        </div>
    </div>
</div>