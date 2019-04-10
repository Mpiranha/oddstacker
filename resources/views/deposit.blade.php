@extends('layouts.layout')

@section('page')
<div class="container-fluid h-100 pr-0 pl-0 bg-land scroll-y text-white">
    <main-nav title="DEPOSIT"></main-nav>
    <div class="little-shade">
        <div class="pr-3 pl-3">
            <label for="exampleFormControlTextarea1">Choose Method Of Payment</label>
            <div class="accordion" id="accordionExample">
                <div id="first-item">
                    <div class="" id="headingOne">
                        <h5 class="mb-0">
                            <div class="box" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h5 class="display-5 mt-2">Deposit</h5>
                            </div>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <ul class="bank-nav nav nav-tabs justify-content-between mt-2 mx-3">
                            <li id="card-nav" class="flex-fill text-center br-2"><a class="text-light text-uppercase f-0-6 active" data-toggle="tab" href="#card">Card</a></li>
                            <li id="bank-nav" class="flex-fill text-center br-2"><a class="text-light text-uppercase f-0-6" data-toggle="tab" href="#bank">Bank</a></li>
                            <li id="quickteller-nav" class="flex-fill text-center br-2"><a class="text-light text-uppercase f-0-6" data-toggle="tab" href="#quickteller">Quickteller</a></li>
                            <li id="gtbank-nav" class="flex-fill text-center"><a class="text-light text-uppercase f-0-6" data-toggle="tab" href="#gtbank">gtbank</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="card" class="tab-pane fade in active show">
                            <div class="d-flex justify-content-around f-0-6 mt-3">
                                <span>Card Number</span>
                                <span>Expiry</span>
                            </div>
                            <bank-details></bank-details>

                            <bank-details></bank-details>

                            <div class="container px-0">
                                <div class="pay-with-card d-flex justify-content-between align-items-center">
                                    <div class="active-circle">

                                    </div>
                                    <strong class="pay-with-text ml-5">Pay with a new card</strong>
                                </div>
                            </div>
                            
                                <form action="" method="post" class="card-details-form">
                                    <div class="card-input-box hide container px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="active-circle">

                                            </div>
                                            <strong class="ml-4">Pay with a new card</strong>
                                        </div>
                                    
                                        <div class="d-flex card-details-group justify-content-around">
                                            <label for="card-number">Card Details</label> 

                                            <div class="d-flex flex-column w-60">
                                                <input class="form-control" type="number" name="card-number" id="card-number" value="" placeholder="Card Number">
                                                <div class="d-flex">
                                                    <input class="form-control" type="number" name="card-expiry" id="card-expiry" value="" placeholder="Expiry">
                                                    <input class="form-control ml-3" type="number" name="card-cvv" id="card-cvv" maxlength="3" value="" placeholder="cvv">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-center d-flex flex-column mt-5">
                                    <label for="card-amount-box">Amount(NGN)</label>
                                    <input type="text" name="card-amount-box" id="card-amount-box" min="100" class="form-control w-70 align-self-center" placeholder="Min. 100" aria-describedby="amount">
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn top-up-btn text-uppercase">TOP UP</button>
                                    </div>
                                </form>
                            
                            </div>

                            <div id="bank" class="tab-pane fade">
                            <form action="" method="post" class="bank-details-form">
                                <div class="card-input-box">
                                    
                                    <div class="d-flex bank-details-group justify-content-around">
                                        <label for="bank-name">Bank Details</label> 

                                        <div class="d-flex flex-column w-60">
                                            <select class="form-control" type="number" name="bank-name" id="bank-name">
                                                <option selected>Please select a bank</option>
                                                <option value="access">Access Bank</option>
                                                <option value="citibank">Citibank</option>
                                                <option value="diamond">Diamond Bank</option>
                                                <option value="ecobank">Ecobank</option>
                                                <option value="fidelity">Fidelity Bank</option>
                                                <option value="fcmb">First City Monument Bank (FCMB)</option>
                                                <option value="fsdh">FSDH Merchant Bank</option>
                                                <option value="gtb">Guarantee Trust Bank (GTB)</option>
                                                <option value="heritage">Heritage Bank</option>
                                                <option value="Keystone">Keystone Bank</option>
                                                <option value="rand">Rand Merchant Bank</option>
                                                <option value="skye">Skye Bank</option>
                                                <option value="stanbic">Stanbic IBTC Bank</option>
                                                <option value="standard">Standard Chartered Bank</option>
                                                <option value="sterling">Sterling Bank</option>
                                                <option value="suntrust">Suntrust Bank</option>
                                                <option value="union">Union Bank</option>
                                                <option value="uba">United Bank for Africa (UBA)</option>
                                                <option value="unity">Unity Bank</option>
                                                <option value="wema">Wema Bank</option>
                                                <option value="zenith">Zenith Bank</option>
                                            </select>
                                            <div class="d-flex">
                                                <input type="text" name="account-number-box" id="account-number-box" min="100" class="form-control w-100 align-self-center" placeholder="Account Number" aria-describedby="amount">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="form-group text-center d-flex flex-column mt-5">
                                    <label for="bank-amount-box">Amount(NGN)</label>
                                    <input type="text" name="bank-amount-box" id="bank-amount-box" min="100" class="form-control w-70 align-self-center" placeholder="Min. 100" aria-describedby="amount">
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn top-up-btn text-uppercase">WITHDRAW</button>
                                    </div>
                                </form>

                            </div>

                            <div id="quickteller" class="tab-pane fade">
                                <p class="px-3 mt-3">Please Visit the link <a href="">www.quickteller.com/oddstakr</a> to carry out Transactions via Quickteller</p>
                            </div>

                            <div id="gtbank" class="tab-pane fade">

                            </div>
                        </div>
                    </div>


                        
                </div>
            </div>

            <div id="second-item">
                <div class="" id="headingTwo">
                    <h5 class="mb-0">
                        <div class="box" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <h5 class="display-5 mt-2">Withdraw</h5>
                        </div>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="d-flex justify-content-around f-0-6 mt-3">
                        <span>Bank</span>
                        <span>Account Number</span>
                    </div>

                    <account-details></account-details>

                    <account-details></account-details>

                    <div class="pay-with-card d-flex align-items-center container px-0">
                        <div class="d-flex align-items-center">
                            <div class="active-circle">

                            </div>
                            <strong class="ml-5">New Account Number?</strong>
                        </div>
                    </div>

                    <form action="" method="post" class="bank-details-form">
                        <div class="card-input-box container px-0 hide">
                            <div class="new-account-text d-flex align-items-center">
                                <div class="active-circle">

                                </div>
                                <strong class="ml-5">New Account Number?</strong>
                            </div>
                            
                            <div class="d-flex bank-details-group justify-content-around">
                                <label for="bank-name">Bank Details</label> 

                                <div class="d-flex flex-column w-60">
                                    <select class="form-control" type="number" name="bank-name" id="bank-name">
                                        <option selected>Please select a bank</option>
                                        <option value="access">Access Bank</option>
                                        <option value="citibank">Citibank</option>
                                        <option value="diamond">Diamond Bank</option>
                                        <option value="ecobank">Ecobank</option>
                                        <option value="fidelity">Fidelity Bank</option>
                                        <option value="fcmb">First City Monument Bank (FCMB)</option>
                                        <option value="fsdh">FSDH Merchant Bank</option>
                                        <option value="gtb">Guarantee Trust Bank (GTB)</option>
                                        <option value="heritage">Heritage Bank</option>
                                        <option value="Keystone">Keystone Bank</option>
                                        <option value="rand">Rand Merchant Bank</option>
                                        <option value="skye">Skye Bank</option>
                                        <option value="stanbic">Stanbic IBTC Bank</option>
                                        <option value="standard">Standard Chartered Bank</option>
                                        <option value="sterling">Sterling Bank</option>
                                        <option value="suntrust">Suntrust Bank</option>
                                        <option value="union">Union Bank</option>
                                        <option value="uba">United Bank for Africa (UBA)</option>
                                        <option value="unity">Unity Bank</option>
                                        <option value="wema">Wema Bank</option>
                                        <option value="zenith">Zenith Bank</option>
                                    </select>
                                    <div class="d-flex">
                                        <input type="text" name="account-number-box" id="account-number-box" min="100" class="form-control w-100 align-self-center" placeholder="Account Number" aria-describedby="amount">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center d-flex flex-column mt-5">
                            <label for="bank-amount-box">Amount(NGN)</label>
                            <input type="text" name="withdraw-amount-box" id="withdraw-amount-box" min="100" class="form-control w-70 align-self-center" placeholder="Min. 100" aria-describedby="amount">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn top-up-btn text-uppercase">TOP UP</button>
                        </div>
                    </form>
                </div>
            </div>

                <div id="third-item">
                    <div class="" id="headingThree">
                        <h5 class="mb-0">
                            <div class="box" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                <h5 class="display-5 mt-2">Transaction History</h5>
                            </div>
                        </h5>
                    </div>

                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            
                    </div>

                </div>
            </div>
        </div>
        <footer-comp></footer-comp>
        </div>
       
    </div>

@endsection