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
                </div>
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLongTitle">Edit Stock Category {{$stockCategory->name}}</h4>
                          </div>
                          <form action="#" method="POST">
                              {{ csrf_field() }}
                              <div class="modal-body">
                                  <div class="form-group">
                                      <label>Odd</label>
                                  <input type="text" name="odd" value="{{$stockCategory->odd}}" class="form-control" placeholder="odd">
                                  </div>
                                  <div class="form-group">
                                      <label>Boxes</label>
                                  <input type="number" name="boxes" value="{{$stockCategory->boxes}}" class="form-control" placeholder="boxes" >
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Edit</button>
                              </div>
                          </form>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection