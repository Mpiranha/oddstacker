@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="col-md-6">
                        <h4 class="title">Users</h4>
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
                            <th>S/N</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Registered</th>
                            <th>Role</th>
                            <th>Action</th>
                        </thead>
                        @php
                            $count = 0;   
                        @endphp
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$count }}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>
                                        @if($user->role === config('role.admin'))
                                         <a href="#" style="color: black"
                                                onclick="
                                                    let result = confirm('Are you sure you want revoke role to user?');
                                                    if (result){
                                                        let sure = confirm('really sure');
                                                        if (sure){
                                                            event.preventDefault();
                                                        document.getElementById('revoke-{{$user->id}}').submit();
                                                        }
                                                    }"
                                                >
                                                    <i class="fa fa-arrow-circle-right cursor green" ></i>
                                            </a>
                                            <form action="{{ route('user.revoke', [$user->id, true]) }}" method="POST"
                                                style="display: none;" id="revoke-{{$user->id}}">
                                                    {{ method_field('PUT')}}
                                                    {{ csrf_field() }}
                                            </form>
                                        @else
                                        <a href="#" style="color: black"
                                                onclick="
                                                    let result = confirm('Are you sure you want make this user admin?');
                                                    if (result){
                                                        let sure = confirm('really sure');
                                                        if (sure){
                                                            event.preventDefault();
                                                        document.getElementById('revoke-{{$user->id}}').submit();
                                                        }
                                                    }"
                                                >
                                                    <i class="fa fa-arrow-circle-right cursor red" ></i>
                                            </a>
                                            <form action="{{ route('user.revoke', [$user->id]) }}" method="POST"
                                                style="display: none;" id="revoke-{{$user->id}}">
                                                    {{ method_field('PUT')}}
                                                    {{ csrf_field() }}
                                            </form>
                                        @endif
                                    </td>
                                </tr>   
                            @endforeach
                        </tbody>

                        {{ $users->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection