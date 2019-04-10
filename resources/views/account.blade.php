@extends('layouts.layout')

@section('page')
<div class="container-fluid h-100 pr-0 pl-0 bg-land scroll-y text-white">
    <main-nav title="ACCOUNT"></main-nav>
    <div class="little-shade h-75">
        <div class="pr-2 pl-2">
            <div class="d-flex flex-column">

                <div class="pt-4">
                
                    <div class="box">
                        <a href="/change-password" class="cash-items display-5 mt-2">Change Password</a>
                    </div>
                </div>

                <div>
                    <div class="box">
                        <a href="/withdrawal" class="cash-items display-5 mt-2">Personal Details</a>
                    </div>
                </div>
            </div>
                

                
            
        </div>

        
    </div>
    <footer-comp></footer-comp>
</div>

@endsection