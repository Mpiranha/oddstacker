@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="height:fit-content">
                    <div class="header" style="margin-bottom: 50px;">
                        <div class="col-md-5">
                            <h3 class="title">Teams</h3>
                        </div>
                        <div class="col-md-7">
                            <button type="submit" class="btn btn-info btn-fill"
                                    data-toggle="modal" data-target="#team-add">
                                Add Team
                            </button>
                        </div>
                    </div>
                    <team-table :sport_id="{{$sport->id}}" :leagues="{{$leagues}}" :teams="{{$teams}}"></team-table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="team-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">ADD NEW TEAM</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('team.create', [$sport->id]) }}" method="POST">
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
                                <option value="club" selected>Club</option>
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
@endsection
