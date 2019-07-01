@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="height:fit-content">
                <div class="header">
                    <div class="col-md-12">
                        <h3 class="text-center black">Create stock</h3>
                    </div>
                </div>
              <stock-index :stockcategories="{{$stockCategories}}" :types="{{$types}}"
              :sports="{{$sports}}" ></stock-index>
            </div>
        </div>
    </div>
</div>
@endsection