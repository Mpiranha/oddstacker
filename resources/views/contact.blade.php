@extends('layouts.layout')

@section('page')
    <div class="container bg-referal px-0 h-100">
        <div class="light-shade h-100">

            <main-nav title="CONTACT"></main-nav>

            <div class="px-2 py-5">

                <div class="row mt-4">
                    <div class="col-12">
                        
                            <div class="form-group">
                              <label class="text-light ml-3" for="">Email</label>
                              <div class="desc-box input-box mt-1 px-5">
                                <input readonly="readonly" type="email" value="customercare@oddstackr.com" class="clear-bg w-100 border-0 p-0 stand-out" name="senders-email" id="senders-email" aria-describedby="emailHelpId" placeholder="">
                              </div>
                              
                            </div>

                           

                            <div class="form-group">
                              <label class="text-light ml-3" for="">Whatsapp</label>
                              <div class="desc-box input-box mt-1 px-5">
                                <input readonly="readonly" type="text" value="+234 8100 2121 411" class="clear-bg w-100 border-0 p-0 stand-out" name="senders-email" id="senders-email" aria-describedby="emailHelpId" placeholder="">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="text-light ml-3" for="">Calls</label>
                              <div class="desc-box input-box mt-1 px-5">
                                <input readonly="readonly" type="text" value=" +234 8100 8282 111" class="clear-bg w-100 border-0 p-0 stand-out" name="senders-email" id="senders-email" aria-describedby="emailHelpId" placeholder="">
                              </div>
                            </div>
                        
                    </div>
                </div>
            </div>
            <footer-comp></footer-comp>
        </div>
    </div>
@endsection

