@extends('layouts.layout')

@section('page')

<div class="container-fluid h-100 pr-0 pl-0 scroll-y bg-land">
    
    <div class="shades">
        <main-nav title="RESULTS"
          :user="{{ Auth::user() }}" :wallet="{{ Auth::user()->wallet }}">
        </main-nav>
        <div class="px-3">
            
            <stock-nav left-content="STOCK" center-content="ALL STOCK" right-content="WINNERS"></stock-nav>
            <date-picker></date-picker>

            <stack-nav class="mt-2"></stack-nav>

            <div class="row">
                <div class="col-12">
                    <div class="d-flex">
                        <input type="text" class="form-control w-70" name="sort-code-search" id="sort-code-search" placeholder="sort code">
                        <select class="form-control w-30 ml-2" name="sort-sport" id="sort-sport">
                            <option selected>Sports</option>
                            <option value="football">Football</option>
                            <option value="basketball">Basketball</option>
                            <option value="icehockey">Ice Hockey</option>
                            <option value="tennis">Tennis</option>
                        </select>
                    </div>
                </div>
            </div>

            <stack-box-new></stack-box-new>
            <stack-box-new></stack-box-new>
            <stack-box-new></stack-box-new>
            <stack-box-new></stack-box-new>
            <stack-box-new></stack-box-new>
        </div>

        
    </div>
    <footer-comp></footer-comp>
</div>

@endsection