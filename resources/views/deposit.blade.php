@extends('layouts.layout')

@section('page')
<div class="shades">
    <main-nav title="DEPOSIT"></main-nav>
       
    <div class="container">
    <label for="exampleFormControlTextarea1">Choose Method Of Payment</label>
    <div class="accordion" id="accordionExample">
        <div class="clear-bg">
            <div class="" id="headingOne">
            <h5 class="mb-0">
                <payment-bar data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></payment-bar>
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
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                    </form>
                        

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            <div class="d-flex">
                                <div type="button" class="btn see btn-light">+100</div>
                                <div type="button" class="btn see btn-light">+200</div>
                                <div type="button" class="btn see btn-light">+400</div>
                                <div type="button" class="btn see btn-light">+800</div>
                                <div type="button" class="btn see btn-light">+1000</div>
                            </div>
                        </div>
                    </div>
                <!--The two button with Red and dark color-->     
                    <div class="row hi">
                        <div class="col-col-xs-12 col-sm-12 col-lg-12">
                            <div class="d-flex">
                                <div  class="btn end end-left btn-danger text-uppercase">Deposit</div>
                                <div class="btn end end-right btn-dark text-uppercase">Cancel</div>
                            </div>
                        </div>
                    </div>
        </div>

            <div class="" id="headingTwo">
            <h5 class="mb-0">
                <payment-bar class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"></payment-bar>
            </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
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
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </form>
                        

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <div class="d-flex">
                        <div type="button" class="btn see btn-light">+100</div>
                        <div type="button" class="btn see btn-light">+200</div>
                        <div type="button" class="btn see btn-light">+400</div>
                        <div type="button" class="btn see btn-light">+800</div>
                        <div type="button" class="btn see btn-light">+1000</div>
                    </div>
                        </div>
                    </div>
                <!--The two button with Red and dark color-->     
                    <div class="row hi">
                        <div class="col-col-xs-12 col-sm-12 col-lg-12">
                            <div class="d-flex">
                                <div  class="btn end end-left btn-danger text-uppercase">Deposit</div>
                                <div class="btn end end-right btn-dark text-uppercase">Cancel</div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
            <h5 class="mb-0">
                <payment-bar class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"></payment-bar>
            </h5>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <p>Please Visit the link <a href="">www.quickteller.com/oddstakr</a> to carry out Transactions via Quickteller</p>
            </div>
        </div>
        </div>               
    </div>
</div>

@endsection