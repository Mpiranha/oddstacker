@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="height:fit-content">
                    <div class="header">
                        <div class="col-md-12">
                            <h3 class="text-center black">Stock</h3>
                        </div>
                    </div>
                    <div class="ro">
                        <div class="col-md-12">
                            <a href="{{route('stock.category')}}" class="btn btn-primary btn-fill btn-sm">Stock Category</a>&nbsp;
                            <a
                                    href="{{route('stock.types')}}" class="btn btn-info btn-fill btn-sm">Stock Types</a>&nbsp;
                            <a href="{{route('stock.create')}}" class="btn btn-success btn-fill btn-sm">Create Stock</a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th class=""></th>
                            <th class=""></th>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="100%" class="text-center">Work in progress...</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection