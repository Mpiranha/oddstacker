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
                            data-toggle="modal" data-target="#addCountry">
                            ADD COUNTRY
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
                            <th class="text-center">flag</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @if (count($countries) > 0)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($countries as $country)
                                    <tr>
                                        <td class="text-center">{{ ++$count }}</td>
                                        <td class="text-center">{{ $country->name }}</td>
                                        <td class="text-center">
                                            <img src="{{ $country->logo }}" height="30px" alt="{{ $country->name }} image"/>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" style="color: black"
                                                onclick="
                                                    let result = confirm('Are you sure you want to delete this country?');
                                                    if (result){
                                                        let sure = confirm('really sure');
                                                        if (sure){
                                                            event.preventDefault();
                                                        document.getElementById('delete-form-{{$country->id}}').submit();
                                                        }
                                                    }"
                                                >
                                                    <i class="fa fa-trash cursor" ></i>
                                            </a>
                                            <form action="{{ route('country.delete', $country->id) }}" method="POST"
                                                style="display: none;" id="delete-form-{{$country->id}}">
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
                                    <td colspan="100%" class="text-center">NO Country or Countries Added</td>
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