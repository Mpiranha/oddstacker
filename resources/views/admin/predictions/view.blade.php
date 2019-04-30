@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info btn-fill" 
                            data-toggle="modal" data-target="#predict-add">
                            ADD PREDICTION
                        </button>
                    </div>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th class="text-center">S/N</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Alias</th>
                            <th class="text-center">sport</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @if (count($predictions) > 0)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($predictions as $prediction)
                                    <tr>
                                        <td class="text-center">{{ ++$count }}</td>
                                        <td class="text-center">{{ $prediction->name }}</td>
                                        <td class="text-center">{{ $prediction->alias }}</td>
                                    <td class="text-center">{{$sport_name}}</td>
                                        <td class="text-center">
                                          <a href="#" style="color: black"
                                                onclick="
                                                    let result = confirm('Are you sure you want to delete this prediction?');
                                                    if (result){
                                                        let sure = confirm('really sure');
                                                        if (sure){
                                                            event.preventDefault();
                                                        document.getElementById('delete-form-{{$prediction->id}}').submit();
                                                        }
                                                    }"
                                                >
                                                    <i class="fa fa-trash cursor" ></i>
                                            </a>
                                            <form action="{{ route('prediction.delete', $prediction->id) }}" method="POST"
                                                style="display: none;" id="delete-form-{{$prediction->id}}">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    </button>
                                                </form>
                                            <span><i class="fa fa-edit"></i></span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="100%" class="text-center">Add predictions</td>
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
 <div class="modal fade" id="predict-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">ADD PREDICTION</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('prediction.create', [$sport_name, $sport_id]) }}" method="POST">
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
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add Prediction</button>
                    </div>
                </form>
            </div>
        </div>
    </div>