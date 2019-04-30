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
                            <th class="text-center">Image</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @if (true)
                                @php
                                    $count = 0;
                                @endphp
                                {{-- @foreach ($leagues as $league) --}}
                                    <tr>
                                        {{-- <td class="text-center">{{ ++$count }}</td>
                                        <td class="text-center">{{ $league->name }}</td> --}}
                                        <td class="text-center">
                                            {{-- <img src="{{ $league->logo }}" height="30px" alt="{{ $league->name }} image"/> --}}
                                        </td>
                                        <td class="text-center">
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            @else
                                <tr>
                                    <td colspan="100@foreach ($leagues as $league)%" class="text-center"></td>
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
                <form action="{{ route('prediction.view') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Arsenal">
                        </div>
                        <div class="form-group">
                            <label>League Logo</label>
                            <input type="text" name="logo" class="form-control" placeholder="Image URL" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">ADD LEAGUE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>