@extends('layouts.layout')

@section('page')
<div class="container-fluid px-0  bg-land">
    <main-nav title="Withdrawal"></main-nav>
    <div class="shades">
        <div class="container">
            <form class="withdaw-form"  action="" method="post">
                <div class="form-group ">
                    <label for="amount-input">Amount:</label>
                    <textarea class="form-control trans text-dark" id="amount-input" rows="3">0</textarea>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <div id="add-100" type="button" class="btn inc btn-light">+100</div>
                            <div id="add-200" type="button" class="btn inc btn-light">+200</div>
                            <div id="add-300" type="button" class="btn inc btn-light">+500</div>
                            <div id="add-400" type="button" class="btn inc btn-light">+1000</div>
                            <div id="add-500" type="button" class="btn inc btn-light">+5000</div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleInputAccountHolder">Account Holder:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPhoneNumber">Phone Number:</label>
                    <input type="tel" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail">Email:</label>
                    <input type="email" class="form-control" id="exampleInputEmail1">
                </div>

                <label for="bank">Banks</i></label>
                <select type="text" class="form-control bg-dark text-light" id="bank">
                    <option selected>Choose</option>
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


                <div class="form-group">
                    <label for="exampleInputPhoneNumber">Account Number:</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>

                <label for="exampleInputEmail">Account Type:</label>
                <select class="form-control bg-dark text-light">
                    <option>Savings</option>
                    <option>Current</option>
                </select>
                <div class="d-flex justify-content-center ">
                    <button type="submit" class="btn btn-danger text-center profile-submit-btn text-uppercase">Make Withdrawal</button>

                </div>
            </form>

        </div>

        
    </div>

    <footer-comp></footer-comp>
</div>

@endsection