@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="height:fit-content">
                <event-create :competition="{{$competition}}"></event-create>
            </div>

            <div class="card" style="height:fit-content">
                <event-show :events="{{ json_encode($events) }}"></event-show>
            </div>

        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{ $events->previousPageUrl() }}">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">{{ $events->currentPage() }}</a></li>
            <li class="page-item"><a class="page-link" href="#">of</a></li>
            <li class="page-item"><a class="page-link" href="#">{{ $events->lastPage()}}</a></li>
            <li class="page-item"><a class="page-link" href="{{ $events->nextPageUrl() }}">Next</a></li>
        </ul>
    </nav>
</div>
@endsection
@section('out')
<settings-modal :countries="{{$countries}}" :leagues="{{$leagues}}"></settings-modal>
@endsection