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
                        Edit Field
                    </div>

                    <form action="{{ route('settings.update') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Site Name</label>
                                <input type="text" name="site_name"
                                       value="{{isset($setting->site_name)?$setting->site_name:""}}"
                                       class="form-control" placeholder="Eg: OddStackr">
                            </div>
                            <div class="form-group">
                                <label>Site Email</label>
                                <input type="email" name="site_mail"
                                       value="{{isset($setting->site_mail)?$setting->site_mail:""}}"
                                       class="form-control" placeholder="Site Mail">
                            </div>
                            <div class="form-group">
                                <label>Site Phone number</label>
                                <input type="tel" name="site_phone"
                                       value="{{isset($setting->site_phone)?$setting->site_phone:""}}"
                                       class="form-control" placeholder="Site Phone Number">
                            </div>
                            <div class="form-group">
                                <label>Site WhatsApp Contact</label>
                                <input type="tel" name="site_whatsapp"
                                       value="{{isset($setting->site_whatsapp)?$setting->site_whatsapp:""}}"
                                       class="form-control" placeholder="080........">
                            </div>
                            <div class="form-group">
                                <label>Site Description</label>
                                <textarea name="site_description" class="form-control"
                                          placeholder="Something about the site...">{{isset($setting->site_description)?$setting->site_description:""}}</textarea>
                            </div>
                            <input type="hidden" name="stock_cat_bool" value="{{$stock_category}}">

                            @if(!$stock_category)
                            <div class="form-group">
                                <h5>Stock Category Setting</h5>
                            </div>
                            <div class="form-group">
                                <table id="stockCatTable" class="table table-hover table-striped">
                                    <thead>
                                    <th>Name</th>
                                    <th>Number of Odds</th>
                                    <th>Matches</th>
                                    <th>Tie Breakers</th>
                                    <th>Tie Breaker 1</th>
                                    <th>Tie Breaker 2</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="Eg: Premium" name="names[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" placeholder="Eg: 59.99" name="odds[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="tel" placeholder="Eg: 15" name="matches[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="tel" placeholder="Eg: 5" name="tie_breakers[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="tel" placeholder="Eg: 3" name="tie_breaker_one[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="tel" placeholder="Eg: 2" name="tie_breaker_two[]"
                                                   class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="Eg: Premium" name="names[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" placeholder="Eg: 59.99" name="odds[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="tel" placeholder="Eg: 15" name="matches[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="tel" placeholder="Eg: 5" name="tie_breakers[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="tel" placeholder="Eg: 3" name="tie_breaker_one[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="tel" placeholder="Eg: 2" name="tie_breaker_two[]"
                                                   class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="Eg: Premium" name="names[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" placeholder="Eg: 59.99" name="odds[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="tel" placeholder="Eg: 15" name="matches[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="tel" placeholder="Eg: 5" name="tie_breakers[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="tel" placeholder="Eg: 3" name="tie_breaker_one[]"
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="tel" placeholder="Eg: 2" name="tie_breaker_two[]"
                                                   class="form-control">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra_script')
    <script>

    </script>
@endsection
