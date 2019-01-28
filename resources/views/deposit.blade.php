@extends('layouts.layout')

@section('page')
<div class="container-fluid h-100 pr-0 pl-0 bg-land scroll-y text-white">
    <main-nav title="DEPOSIT"></main-nav>
    <div class="shades">
        <div class="pr-3 pl-3">
            <label for="exampleFormControlTextarea1">Choose Method Of Payment</label>
            <div class="accordion" id="accordionExample">
                <div id="first-item">
                    <div class="" id="headingOne">
                        <h5 class="mb-0">
                            <div class="box" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h5 class="display-5 mt-2">Paystack</h5>
                            </div>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <form>    
                            <label for="">ATM Card:</label>
                            <div class="form-group">
                                <select class="form-control form-control-lg">
                                    <option>Verve Card</option>
                                    <option>Master Card</option>
                                    <option>Visa Card</option>
                                </select>
                            </div>
                                    
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Amount:</label>
                                <textarea class="form-control clear-bg amount-field" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </form>
                            
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <div type="button" class="btn inc btn-light">+100</div>
                                    <div type="button" class="btn inc btn-light">+200</div>
                                    <div type="button" class="btn inc btn-light">+400</div>
                                    <div type="button" class="btn inc btn-light">+800</div>
                                    <div type="button" class="btn inc btn-light">+1000</div>
                                </div>
                            </div>
                        </div>
                        <!--The two button with Red and dark color-->     
                        <div class="row hi">
                            <div class="col-col-xs-12 col-sm-12 col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <div  class="btn end end-left text-uppercase">Deposit</div>
                                    <div class="btn end end-right text-uppercase">Cancel</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="second-item">
                    <div class="" id="headingTwo">
                        <h5 class="mb-0">
                            <div class="box" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <h5 class="display-5 mt-2">Interswitch Webpay</h5>
                            </div>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <form>      
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Amount:</label>
                                <textarea class="form-control clear-bg amount-field" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </form>
                            

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div class="d-flex justify-content-center">
                                <div type="button" class="btn inc btn-light">+100</div>
                                <div type="button" class="btn inc btn-light">+200</div>
                                <div type="button" class="btn inc btn-light">+400</div>
                                <div type="button" class="btn inc btn-light">+800</div>
                                <div type="button" class="btn inc btn-light">+1000</div>
                            </div>
                        </div>
                    </div>
                    <!--The two button with Red and dark color-->     
                    <div class="row hi">
                        <div class="col-col-xs-12 col-sm-12 col-lg-12">
                            <div class="d-flex justify-content-center">
                                <div  class="btn end end-left btn-danger text-uppercase">Deposit</div>
                                <div class="btn end end-right btn-dark text-uppercase">Cancel</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div id="third-item">
                    <div class="" id="headingThree">
                        <h5 class="mb-0">
                            <div class="box" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                <h5 class="display-5 mt-2">Quickteller</h5>
                            </div>
                        </h5>
                    </div>

                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <p>Please Visit the link <a href="">www.quickteller.com/oddstakr</a> to carry out Transactions via Quickteller</p>
                    </div>

                </div>
            </div>
        </div>
        </div>
        <footer-comp></footer-comp>
    </div>

@endsection