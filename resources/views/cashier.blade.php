@extends('layouts.layout')

@section('page')
<div class="container-fluid h-100 pr-0 pl-0 bg-land scroll-y text-white">
    <main-nav title="CASHIER"
        :user="{{ Auth::user() }}" :wallet="{{ Auth::user()->wallet }}">
        </main-nav>
    <div class="shades h-75">
        <div class="pr-2 pl-2">
            <div class="d-flex flex-column">

                <div class="pt-4">
                
                    <div class="box">
                        <a href="/deposit" class="cash-items display-5 mt-2">Deposit</a>
                    </div>
                </div>

                <div>
                    <div class="box">
                        <a href="/withdrawal" class="cash-items display-5 mt-2">Withdrawal</a>
                    </div>
                </div>

                <div>
                    <div class="box">
                        <a href="/tran-hitory" class="cash-items display-5 mt-2">Transaction History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer-comp></footer-comp>
</div>

@endsection