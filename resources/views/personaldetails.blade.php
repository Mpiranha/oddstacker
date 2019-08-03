@extends('layouts.layout')

@section('page')
<div class="container-fluid h-100 pr-0 pl-0 bg-land scroll-y text-white">
    <main-nav title="PROFILE" :user="{{ Auth::user() }}" 
        :wallet="{{ Auth::user()->wallet }}">
    </main-nav>
    <div class="little-shade h-75">
        <div class="pr-2 pl-2">
            <div class="d-flex flex-column">

                <div class="pt-4">
                
                    <div class="box">
                        <a href="/deposit" class="cash-items display-5 mt-2">Deposit</a>
                    </div>
                </div>

                <div>
                    <div class="box">
                        <a href="/cashier" class="cash-items display-5 mt-2">Bank</a>
                    </div>
                </div>

                <div>
                    <div class="box">
                        <a href="/result" class="cash-items display-5 mt-2">My Stock</a>
                    </div>
                </div>

                <div>
                    <div class="box">
                        <a href="/account" class="cash-items display-5 mt-2">Account</a>
                    </div>
                </div>

                <div>
                    <div class="box">
                        <a href="/" class="cash-items display-5 mt-2">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer-comp></footer-comp>
</div>

@endsection