@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="height:fit-content">
                <div class="header">
                    <div class="col-md-12">
                        <h3 class="text-center black">Stock Types</h3>
                    </div>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>Name</th>
                        </thead>
                        <tbody>
                          @foreach ($types as $sc)
                            <tr>
                                <td>
                                  {{$sc->name}}
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection