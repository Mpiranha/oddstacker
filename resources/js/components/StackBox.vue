<template>
    <div class="container-fluid px-0">
        <div class="row">
            <div class="d-flex" id="octagon">
                <i @click="bringMoreDetails()" class="far fa-chart-bar info-btn"></i>
                <div class="d-flex h-100 mt-3 w-20 ball" :class="this.class">
                    <i class="fas fa-futbol"></i>
                </div>
                <div class="w-80 mt-3 mr-3">
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between w-100 align-items-end">
                            <h6 class="bold-1 top-section">Both Teams to Score</h6>
                            <h6 class="pr-3 bold-1 top-section">3:00pm</h6>
                        </div>
                        <div class="another-shape w-100 d-flex" :class="this.class">
                            <span class="amt-text">NGN{{ stock.value }}</span>
                            <!-- <span class="cur-stack pt-1 ml-2">NGN 20 000</span> -->
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <h6 class="mb-0">STAKE</h6>
                            <h6 class="mb-0">WIN MARGIN</h6>
                            <h6 class="mb-0">ENTRY</h6>
                        </div>
                        <div class="d-flex justify-content-between w-100">
                            <h6 class="bold-1 stand-out">NGN{{ stock.stake }}</h6>
                            <h6 class="bold-1 pr-21 stand-out">{{ stock.margin }}</h6>
                            <h6 class="bold-1 stand-out">{{ stock.entry }}</h6>
                        </div>
                        <div class="d-flex pt-1 bt-1 justify-content-between w-100 align-items-end">
                            <h6>CODE: <span class="bold-1 stand-out">{{ stock.code }}</span></h6>
                            <h6>ODDS: <span class="bold-1 odd-green" :class="this.class">{{ stock.category.odd }}</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <div class="more-details w-100" :class="{ 'show-details' : detailsIsVisible }">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    props: ['stock'],
    data() {
        return {
            detailsIsVisible: false
        }
    },
    mounted: function(){
        console.log(this.stock, this.class);
    },
    methods: {
        bringMoreDetails() {
            this.detailsIsVisible = !this.detailsIsVisible;
        }
    },
    computed: {
        class: function(){
            if(this.stock.category.name === 'double up')
                return 'double-up';
            else if(this.stock.category.name === 'head to head')
                return 'h2h'
            else 
                return 'premium'
        }
    }
}
</script>


<style>
    .more-details {
        height: 0;
        background-color: white;
    }

    .show-details {
        animation: grow .5s 1;
        animation-direction: alternate;
        animation-fill-mode: both;
    }

    @-moz-keyframes grow{
        from {height: 0;}
        to { height: 70px;}
    }

    @-webkit-keyframes grow{
        from {height: 0;}
        to { height: 70px;}
    }

    @-o-keyframes grow{
        from {height: 0;}
        to { height: 70px;}
    }

    @keyframes grow{
        from {height: 0;}
        to { height: 70px;}
    }

     #octagon {
      width: 100%;
      height: 100%;
      background: #ffffff85;
      position: relative;
      margin: 0.7rem 1rem;
    }

    .another-shape {
        height: 20px;
        position: relative;
        z-index: 1;
        background-color: gold;
        padding-bottom: 1.1rem;
        padding-left: 1rem;
        font-size: 1.1rem;
        font-weight: bolder;
    }

    .h2h.another-shape{
        background-color: red !important;
    }

    .double-up.another-shape{
        background-color: blue !important;
    }

    .another-shape::before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        z-index: 0;
        border-bottom: 8px solid gold;
        border-right: 17px solid #eee0;
        top: -8px;
        left: 0;
     }

    .h2h.another-shape::before{
        border-bottom: 8px solid red !important;
    }

    .double-up.another-shape::before{
        border-bottom: 8px solid blue !important;
    }

    .another-shape::after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -10px;
        left: 0;
        z-index: -1;
        border-top: 10px solid gold;
        border-left: 17px solid #eee0;
        border-right: 15px solid gold;
     }

    .h2h.another-shape::after{
        border-top: 10px solid red !important;
        border-right: 15px solid red !important;
    }

    .double-up.another-shape::after{
        border-top: 10px solid blue !important;
        border-right: 15px solid blue !important;
    }

     .odd-green {
         font-size: 0.8rem;
         color: gold;
     }

     .h2h.odd-green{
         color: red;
     }
     .double-up.odd-green{
         color: blue;
     }

    #octagon:after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -15px;
        left: 0;
        border-top: 15px solid #ffffff85;
        border-left: 15px solid #eee0;
        border-right: 14px solid #eee0;
    }  
    .amt-text {
        display: block;
        font-weight: bolder;
        font-size: 1.5rem;
        position: absolute;
        bottom: -11px;
    }

    .cur-stack {
        display: block;
        font-weight: bolder;
        font-size: 0.6rem;
    }

    .top-section {
        font-size: 0.8rem !important;
        color: #000000 !important;
    }

    .stand-out {
        font-size: 0.8rem !important;
        color: #000000 !important;
    }

    .info-btn {
        position: absolute;
        bottom: 9px;
        left: 20px;
        font-size: 1rem;
    }
</style>