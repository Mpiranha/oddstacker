@if(session()->has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    {!! session()->get('success') !!}
  <button type="button" class="close" data-dismiss="alert" style="position: initial;
    margin-top: -3px;" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif