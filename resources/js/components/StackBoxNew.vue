<template>
    <div class="row">
        <div class="d-flex" id="octagon">
            <div class="d-flex h-100 mt-4 w-20 ball">
                <i class="fas fa-futbol"></i>
            </div>
            <div class="w-80 mt-3 mr-3">
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
                            <h6 class="bold">STAKE</h6>
                            <h6 class="bold-1 stand-out">NGN 400 000</h6>
                        </div>

                        <div class="flex-grow-1 rounded-border py-1 px-2 pt-1">
                            <div class="d-flex justify-content-around mb-1">
                                <h6 class="bold-1 stand-out m-0">POS</h6>
                                <h6 class="pl-2 bold-1 m-0 stand-out">WON</h6>
                                <h6 class="bold-1 stand-out m-0">ODDS</h6>
                            </div>

                            <div class="d-flex justify-content-around">
                                <h6 class="bold-1 more-em m-0">5/400</h6>
                                <h6 class="bold-1 amount-text m-0 px-2 text-white ">2000</h6>
                                <h6 class="bold-1 more-em m-0">41.22</h6>
                            </div>
                        </div>

                        <div class="d-flex flex-column ml-2">
                            <h6 class="bold">ENTRY</h6>
                            <h6 class="bold-1 stand-out">7/100</h6>
                        </div>
                    </div>
                    <div class="d-flex pt-1 bt-1 justify-content-between w-100 align-items-end mt-2">
                        <h6 class="m-0">WIN MARGIN </h6>
                        <h6 class="m-0">CODE</h6>
                        <h6 class="m-0">ODDS</h6>
                    </div>
                    <div class="d-flex justify-content-between align-items-start w-100">
                        <h6 class="bold-1 stand-out">FIRST ONLY</h6>
                        <h6 class="bold-1 stand-out">56758</h6>
                        <h6 class="bold-1 odd-green">44.95</h6>
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
        bottom: -15px;
        left: 0;
        border-top: 15px solid #ffffff85;
        border-left: 15px solid #eee0;
        border-right: 14px solid #eee0;
    }  

    .rounded-border {
        border-radius: 30px;
        border: 2px solid green;
        align-items: center;
    }
    .amount-text {
        border-radius: 30px;
        background-color: green;
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