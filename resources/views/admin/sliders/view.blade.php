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
                                    data-toggle="modal" data-target="#slider-add">
                                ADD SLIDER
                            </button>
                        </div>
                        <div class="col-md-6">
                            <h4 style="margin:0" class="title">Slider Images</h4>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>S/N</th>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @if (count($sliders) > 0)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ ++$count }}</td>
                                        <td>
                                            <img src="{{ $slider->image }}" height="30px"/>
                                        </td>
                                        <td>
                                            <a href="{{$slider->link}}" style="color: black" target="_blank">
                                                <i class="fa fa-link cursor" ></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" style="color: black"
                                               onclick="
                                                       var result = confirm('Are you sure you want to delete this Image?');
                                                       if (result){
                                                       var sure = confirm('really sure');
                                                       if (sure){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form-{{$slider->id}}').submit();
                                                       }
                                                       }"
                                            >
                                                <i class="fa fa-trash cursor" ></i>
                                            </a>
                                            <form action="{{ route('slider.delete', $slider->id) }}" method="POST"
                                                  style="display: none;" id="delete-form-{{$slider->id}}">
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
                                    <td colspan="100%" class="text-center">No Sliders yet</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{-- {{ $leagues->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="slider-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">ADD SLIDER IMAGE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('slider.create') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Slider Image</label>
                        <input type="text" name="image" class="form-control" placeholder="Image URL" value="">
                    </div>
                    <div class="form-group">
                        <label>Slider Link</label>
                        <input type="text" name="link" class="form-control" placeholder="Link URL" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ADD IMAGE</button>
                </div>
            </form>
        </div>
    </div>
</div>