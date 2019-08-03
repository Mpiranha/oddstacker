<template>
    <div class="row">
        <div class="d-flex" id="octagon">
            <div class="d-flex h-100 mt-4 w-20 ball">
                <i class="fas fa-futbol"></i>
            </div>
            <div class="w-80 mt-1 mr-3">
                <div class="d-flex flex-column">
                    <div class="d-flex justify-content-between w-100 align-items-end">
                        <h6 class="bold-1 top-section">Both Teams to Score</h6>
                        <h6 class="bold-1 pr-3 top-section">05:32:15</h6>
                    </div>
                    <div class="another-shape w-100">
                        <div class="container-amount  d-flex">
                            <span class="amt-text">NGN 100,000</span>
                            <span class="cur-stack pt-3 ml-2">100% Full</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <div class="d-flex flex-column mr-2">
                            <h6 class="bold m-0">STAKE</h6>
                            <h6 class="bold-1 stand-out m-0">NGN 400 000</h6>
                        </div>

                        <div class="flex-grow-1 align-self-center py-1 px-2 pt-1">
                            <h6 class="bold text-uppercase text-center m-0">Win MARGIN</h6>
                            <h6 class="bold-1 stand-out text-uppercase text-center m-0">top 3</h6>
                        </div>

                        <div class="d-flex flex-column ml-2">
                            <h6 class="bold m-0">ENTRY</h6>
                            <h6 class="bold-1 stand-out m-0">7/100</h6>
                        </div>
                    </div>
                    <div class="d-flex pt-1 bt-1 justify-content-between w-100 align-items-end mt-2">
                        <h6 class="m-0">ODDS: <span class="bold-1 stand-out">44.95</span> </h6>

                        <h6 class="m-0 f-1 status-text text-center">LIVE</h6>

                        <h6 class="m-0">CODE: <span class="bold-1 stand-out">56758</span> </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {

    }
}
</script>


<style>
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

     .container-amount {
         position: absolute;
         bottom: -11px;
     }
    #octagon:after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -10px;
        left: 0;
        border-top: 10px solid #ffffff85;
        border-left: 15px solid #eee0;
        border-right: 14px solid #eee0;
    }  

    .rounded-border {
        border-radius: 30px;
        border: 2px solid green;
        align-items: center;
    }
    .status-text {
        border-radius: 30px;
        background-color: green;
        padding: 0 .8rem;
        color: #fbf7f7 !important;
    }
    .amt-text {
        display: block;
        font-weight: bolder;
        font-size: 1.5rem;
    }
    .cur-stack {
        display: block;
        font-weight: bolder;
        font-size: 0.7rem;
    }

    .odd-green {
         font-size: 0.8rem;
         color: gold !important;
     }


    .more-em {
        font-size: 0.65rem !important;
        color: #01000c;
    }

    .top-section {
        font-size: 0.8rem !important;
        color: #000000 !important;
    }

    .stand-out {
        font-size: 0.8rem !important;
        color: #000000 !important;
    }
</style>