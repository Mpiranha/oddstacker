<template>
    <div class="row">
        <div class="d-flex" id="octagon">
            <div class="d-flex h-100 mt-3 w-20 ball">
                <i class="far fa-futbol"></i>
            </div>
            <div class="w-80 mt-3 mr-3">
                <div class="d-flex flex-column">
                    <div class="d-flex justify-content-between w-100 align-items-end">
                        <h6 class="bold">Both Teams to Score</h6>
                        <h6 class="bold-1 pr-3">05:32:15</h6>
                    </div>
                    <div class="another-shape w-100">
                        <span class="amt-text">NGN 100 000</span>
                        <span class="cur-stack">NGN 20 000</span>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <div class="d-flex flex-column mr-3">
                            <h6 class="bold">STAKE</h6>
                            <h6 class="bold-1">NGN 400 000</h6>
                        </div>

                        <div class="flex-grow-1 rounded-border px-3 pt-1">
                            <div class="d-flex justify-content-between">
                                <h6 class="bold-1 darker">POS</h6>
                                <h6 class="pl-2 bold-1 darker">WON</h6>
                                <h6 class="bold-1 darker">ODDS</h6>
                            </div>

                            <div class="d-flex justify-content-between">
                                <h6 class="bold-1 more-em">5/400</h6>
                                <h6 class="bold-1 amount-text px-3 text-white ">2000</h6>
                                <h6 class="bold-1 more-em">41.22</h6>
                            </div>
                        </div>

                        <div class="d-flex flex-column ml-3">
                            <h6 class="bold">ENTRY</h6>
                            <h6 class="bold-1">7/100</h6>
                        </div>
                    </div>
                    <div class="d-flex pt-1 bt-1 justify-content-between w-100 align-items-end mt-2">
                        <h6>WIN MARGIN </h6>
                        <h6>CODE</h6>
                        <h6>ODDS</h6>
                    </div>
                    <div class="d-flex justify-content-between align-items-start w-100">
                        <h6 class="bold-1 darker">FIRST ONLY</h6>
                        <h6 class="bold-1 darker">56758</h6>
                        <h6 class="bold-1 darker">44.95</h6>
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
        background-color: #e50101ba;
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
        border-bottom: 8px solid #e50101ba;
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
        border-top: 10px solid #e50101ba;
        border-left: 17px solid #eee0;
        border-right: 15px solid #e50101ba;
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
    }
    .amount-text {
        border-radius: 30px;
        background-color: green;
    }
    .amt-text {
        position: absolute;
        top: -4px;
        left: 20px;
        font-weight: bolder;
    }
    .cur-stack {
        position: absolute;
        top: 4px;
        left: 153px;
        font-weight: bolder;
        font-size: 0.7rem;
    }

    .darker {
        color: #01000c;
        font-size: 0.8rem;
    }

    .more-em {
        font-size: 0.8rem !important;
        color: #01000c;
    }
</style>