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
                        <h6>05:32:15</h6>
                    </div>
                    <div class="another-shape w-100">
                        NGN 20, 000
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <h6>STAKE</h6>
                        <h6>WIN MARGIN</h6>
                        <h6>ENTRY</h6>
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <h6 class="bold-1">NGN 400</h6>
                        <h6 class="bold-1 pr-21">TOP HALF</h6>
                        <h6 class="bold-1">100</h6>
                    </div>
                    <div class="d-flex pt-1 bt-1 justify-content-between w-100 align-items-end">
                        <h6>CODE <span class="bold-1">FF32421</span></h6>
                        <h6>ODDS <span class="bold-1">44.95</span></h6>
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
      background: #FFFFFF;
      position: relative;
      margin: 0.5rem 1rem;
    }

    .another-shape {
        height: 20px;
        position: relative;
        z-index: 1;
        background-color: #E50101;
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
        border-bottom: 8px solid #E50101;
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
        border-top: 10px solid #E50101;
        border-left: 17px solid #eee0;
        border-right: 15px solid #E50101;
     }
    #octagon:after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -8px;
        left: 0;
        border-top: 9px solid #FFFFFF;
        border-left: 15px solid #eee0;
        border-right: 15px solid #eee0;
    }  
</style>