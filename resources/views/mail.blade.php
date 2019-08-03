@extends('layouts.layout')

@section('page')
    <div class="container bg-land px-0">
        <div class="light-shade h-100">

            <main-nav title="MAIL"></main-nav>

            <div class="px-2 py-5">

                <div class="row mt-4">
                    <div class="col-12">
                        
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="desc-box input-box mt-1 px-3">
                                        <select class="mail-select clear-bg w-100 border-0 p-0 stand-out" name="" id="">
                                            <option selected>Select one</option>
                                            <option value="">Mail 1</option>
                                            <option value="">Mail 2</option>
                                            <option value="">Mail 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                           

                            <div class="form-group mt-5">
                              <div class="desc-box input-box mt-1 px-4">
                                <input readonly="readonly" type="text" value="Welcome to Odstackr" class="clear-bg w-100 border-0 p-0 stand-out" id="subject-email" aria-describedby="emailHelpId" placeholder="">
                              </div>
                            </div>

                            <div class="form-group mt-5">
                              
                              <div class="desc-box input-box mt-1 px-4">
        
                                <textarea readonly="readonly" class="clear-bg w-100 border-0 p-0 stand-out" id="mail-content" rows="5" cols="100" aria-describedby="emailHelpId" placeholder="">
                                </textarea>
                              </div>
                            </div>
                        
                    </div>
                </div>
            </div>
            <footer-comp></footer-comp>
        </div>
    </div>
    
@endsection

