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
                                    data-toggle="modal" data-target="#group-add">
                                ADD GROUP
                            </button>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-center">Prediction Groups</h3>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>S/N</th>
                            <th>Name</th>
                            </thead>
                            <tbody>
                            @if (count($groups) > 0)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($groups as $group)
                                    <tr>
                                        <td>{{ ++$count }}</td>
                                        <td>
                                            {{$group->name}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="100%" class="text-center">No group available.</td>
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
<div class="modal fade" id="group-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">ADD PREDICTION GROUP</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.prediction.group_create') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="home win">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Group</button>
                </div>
            </form>
        </div>
    </div>
</div>