@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                </div>
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLongTitle">Edit Field</h4>
                          </div>
                          <form action="{{ route('prediction.update', [$id]) }}" method="POST">
                              {{ csrf_field() }}
                              <div class="modal-body">
                                  <div class="form-group">
                                      <label>Name</label>
                                  <input type="text" name="name" value="{{$prediction->name}}" class="form-control" placeholder="home win">
                                  </div>
                                  <div class="form-group">
                                      <label>Alias</label>
                                  <input type="text" name="alias" value="{{$prediction->alias}}" class="form-control" placeholder="1x" value="">
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