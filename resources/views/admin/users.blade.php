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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered</th>
                            <th>Action</th>
                        </thead>
                        @php
                            $count = 0;   
                        @endphp
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$count }}</td>
                                    <td>$user->name</td>
                                    <td>$user->email</td>
                                    <td>$user->created_at</td>
                                    <td>ACTION</td>
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