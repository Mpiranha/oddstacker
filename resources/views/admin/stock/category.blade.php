@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="height:fit-content">
                <div class="header">
                    <div class="col-md-12">
                        <h3 class="text-center black">Stock Categories</h3>
                    </div>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th class="">Name</th>
                            <th class="">Odd</th>
                            <th class="">Boxes</th>
                            <th class="">Action</th>
                        </thead>
                        <tbody>
                          @foreach ($stockCategories as $sc)
                            <tr>
                                <td class="">
                                  {{$sc->name}}
                                </td>
                                <td class="">
                                  {{$sc->odd}}
                                </td>
                                <td class="">
                                  {{$sc->boxes}}
                                </td>
                                <td class="">
                                  <a href="{{route('stock.category.update',[$sc->id])}}" class="btn btn-sm btn-primary">Edit</a>
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