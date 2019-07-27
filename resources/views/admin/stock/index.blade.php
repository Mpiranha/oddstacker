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
                            <a href="{{route('stock.category')}}" class="btn btn-primary btn-fill btn-sm">Stock
                                Category</a>&nbsp;
                            <a
                                    href="{{route('stock.types')}}" class="btn btn-info btn-fill btn-sm">Stock Types</a>&nbsp;
                            <a href="{{route('stock.create')}}" class="btn btn-success btn-fill btn-sm">Create Stock</a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>Sport</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Odd</th>
                            <th>Entries</th>
                            <th>Stake</th>
                            <th>Margin</th>
                            <th>Duplicate</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @if(count($stocks) > 0)
                                @foreach ($stocks as $stock)
                                    <tr>
                                        <td>{{ $stock->sport->name }}</td>
                                        <td>{{ $stock->stock_type_txt }}</td>
                                        <td>{{ number_format($stock->value, 2) }}</td>
                                        <td>{{ $stock->category->odd }}</td>
                                        <td>{{ count($stock->entries) }}</td>
                                        <td>{{ number_format($stock->stake, 2) }}</td>
                                        <td>{{ $stock->no_winners }}</td>
                                        <td>{{ $stock->duplicate == 1 ? 'Yes': 'No' }}</td>
                                        <td><button type="button" class="btn btn-primary btn-sm btn-fill">Action 1</button></td>
                                        <td><button type="button" class="btn btn-info btn-sm btn-fill">Action 2</button></td>
                                        <td><button type="button" class="btn btn-success btn-sm btn-fill">Action 3</button></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="100%" class="text-center">No stock for now</td>
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