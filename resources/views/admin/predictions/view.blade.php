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
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info btn-fill"
                                    data-toggle="modal" data-target="#predict-add">
                                ADD PREDICTION
                            </button>
                            <a class="btn btn-info btn-fill" href="{{ route('admin.prediction.group') }}">
                                PREDICTION GROUPS
                            </a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Alias</th>
                            <th>Group</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @if (count($predictions) > 0)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($predictions as $prediction)
                                    <tr>
                                        <td>{{ ++$count }}</td>
                                        <td>{{ toUpperCase($prediction->name)}}</td>
                                        <td>{{ $prediction->alias }}</td>
                                        <td>{{ $prediction->group->name }}</td>
                                        <td>
                                            <a href="#" style="color: black"
                                               onclick="
                                                       var result = confirm('Are you sure you want to delete this prediction?');
                                                       if (result){

                                                       event.preventDefault();
                                                       document.getElementById('delete-form-{{$prediction->id}}').submit();

                                                       }"
                                            >
                                                <i class="fa fa-trash cursor"></i>
                                            </a>
                                            <form action="{{ route('prediction.delete', $prediction->id) }}"
                                                  method="POST"
                                                  style="display: none;" id="delete-form-{{$prediction->id}}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                </button>
                                            </form>
                                            <span>
                                            <a href="{{route('prediction.edit', [$prediction->id])}}"
                                               style="color:black">
                                                <i class="fa fa-edit"></i></a></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="100%" class="text-center">No prediction created. Why not add predictions now.</td>
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
<div class="modal fade" id="predict-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">ADD PREDICTION</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('prediction.create', [$sport_id]) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="home win">
                    </div>
                    <div class="form-group">
                        <label>Alias</label>
                        <input type="text" name="alias" class="form-control" placeholder="1x" value="">
                    </div>
                    <div class="form-group">
                        <label>Group</label>
                        <select class="form-control" name="group">
                            <option value="" selected disabled>Select Group</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Prediction</button>
                </div>
            </form>
        </div>
    </div>
</div>