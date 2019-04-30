@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-info btn-fill" 
                            data-toggle="modal" data-target="#league-add">
                            ADD LEAGUE
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
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @if (count($leagues) > 0)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($leagues as $league)
                                    <tr>
                                        <td class="text-center">{{ ++$count }}</td>
                                        <td class="text-center">{{ $league->name }}</td>
                                        <td class="text-center">
                                            <img src="{{ $league->logo }}" height="30px" alt="{{ $league->name }} image"/>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" style="color: black"
                                                onclick="
                                                    let result = confirm('Are you sure you want to delete this League?');
                                                    if (result){
                                                        let sure = confirm('really sure');
                                                        if (sure){
                                                            event.preventDefault();
                                                        document.getElementById('delete-form-{{$league->id}}').submit();
                                                        }
                                                    }"
                                                >
                                                    <i class="fa fa-trash cursor" ></i>
                                            </a>
                                            <form action="{{ route('league.delete', $league->id) }}" method="POST"
                                                style="display: none;" id="delete-form-{{$league->id}}">
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
                                    <td colspan="100@foreach ($leagues as $league)%" class="text-center">NO LEAGUE AVAILABLE</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $leagues->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    <div class="modal fade" id="league-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">ADD LEAGUE</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('league.create') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>League Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Arsenal">
                        </div>
                        <div class="form-group">
                            <label>League Logo</label>
                            <input type="text" name="logo" class="form-control" placeholder="Image URL" value="">
                        </div>
                        <div class="form-group">
                            <label for="type">Country</label>
                            <select class="form-control" name="country">
                                @foreach ($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">Sports</label>
                            <select class="form-control" name="sport">
                                @foreach ($sports as $sport)
                            <option value="{{$sport->id}}">{{$sport->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">ADD LEAGUE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>