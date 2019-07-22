<template>
    <div class="container-fluid px-0">
        <div class="row">
            <div class="d-flex" id="octagon">
                <div class="participated-indicator">
                </div>
                <div class="info-btn">
                    <img src="/images/123-blocks2-512.png" class="img-fluid" @click="bringMoreDetails()">
                </div>
                
                <!-- <div class="d-flex h-100 mt-0 w-20 ball-icn"
                :class="{'ball-icn-premium': isPremium, 'ball-icn-head-head': isHeadToHead, 'ball-icn-doubleup': isDoubleUp}"> -->
                <div class="d-flex h-100 mt-0 w-20 ball-icn" :class="this.class">
                    <i class="fas fa-futbol"></i>
                </div>
                <div class="w-80 mt-0 mr-3">
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between w-100 align-items-end">
                            <h6 class="bold-1 stand-out">Both Teams to Score</h6>
                            <h6 class="pr-3 bold-1 stand-out">3:00pm</h6>
                        </div>
                        <div class="another-shape w-100 d-flex" :class="this.class">
                            <span class="amt-text">₦ {{ stock.value }}</span>
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
    mounted: function(){},
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

    .ball-icn {
        padding: 1.5rem 1rem;
        font-size: 1.5rem;
    }

    .ball-icn-premium {
        color: rgb(255, 192, 0) !important;
    }

    .ball-icn-doubleup {
        color: rgb(0, 112, 192) !important;

    }

    .ball-icn-head-head {
        color: rgb(255, 32, 32) !important;
    }
     #octagon {
      width: 100%;
      height: 100%;
      background: #ffffff;
      position: relative;
      margin: 0.2rem 1rem;
      padding-top: .3rem;
    }

    .another-shape {
        height: 20px;
        position: relative;
        z-index: 1;
        /* background-color: rgb(255, 192, 0); */
        padding-bottom: 1.1rem;
        padding-left: 1rem;
        font-size: 1.1rem;
        font-weight: bolder;
    }

    .h2h.another-shape{
        background-color: rgb(255, 32, 32) !important;
    }

    .double-up.another-shape{
        background-color: rgb(0, 112, 192) !important;
    }

    .another-shape::before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        z-index: 0;
        border-bottom: 8px solid rgb(255, 192, 0);
        border-right: 17px solid #eee0;
        top: -8px;
        left: 0;
     }

    .h2h.another-shape::before{
         border-bottom: 8px solid rgb(255, 32, 32) !important;
        border-right: 17px solid #eee0;
    }

    .double-up.another-shape::before{
        border-bottom: 8px solid rgb(0, 112, 192) !important;
        border-right: 17px solid #eee0;
    }

    .another-shape::after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -10px;
        left: 0;
        z-index: -1;
        border-top: 10px solid rgb(255, 192, 0);
        border-left: 17px solid #eee0;
        border-right: 15px solid rgb(255, 192, 0);
     }




     .head-to-head::before {
         border-bottom: 8px solid rgb(255, 32, 32) !important;
        border-right: 17px solid #eee0;
     }

     .head-to-head::after {
          border-top: 10px solid rgb(255, 32, 32) !important;
        border-left: 17px solid #eee0;
        border-right: 15px solid rgb(255, 32, 32) !important;
     }

    .double-up {
         background-color: rgb(0, 112, 192);
     }







     .odd-green {
         font-size: 0.8rem;
         color: rgb(255, 192, 0) !important;
     }
    .h2h.another-shape::after{
        border-top: 10px solid red !important;
        border-right: 15px solid red !important;
    }

    .double-up.another-shape::after{
        border-top: 10px solid rgb(0, 112, 192) !important;
        border-left: 17px solid #eee0;
        border-right: 15px solid rgb(0, 112, 192) !important;
    }


     .h2h.odd-green{
         color: rgb(255, 32, 32);
     }
     .double-up.odd-green{
         color: rgb(0, 112, 192);
     }

    #octagon::after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -10px;
        left: 0;
        border-top: 10px solid #ffffff;
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





    .stand-out {
        font-size: 0.8rem !important;
        color: #000000 !important;
    }

    .info-btn {
        position: absolute;
        bottom: 9px;
        left: 20px;
        height: 20px;
        width: 20px;
    }

    .participated-indicator {
        position: absolute;
        top: 0;
        left: 0;
        border-width: 5px;
        border-color: green transparent transparent green;
        border-style: solid;
    }
</style>