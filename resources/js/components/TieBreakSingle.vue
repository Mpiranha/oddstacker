<template>
  
        <div class="box">
            <div class="d-flex justify-content-around">
                <div class="h-100 mt-1 star">
                    <i v-if="state === 'normal'" @click="changeState('highlighted')" class="far fa-star text-light "></i>
                    <i v-else @click="changeState('normal')" class="fas fa-star text-yellow"></i>
                </div>

                <div class="odd-display text-center text-uppercase text-light">
                    under 2.5
                </div>
                <input id="oddbox" type="text" readonly="readonly" class="input-odd b-0 text-center text-dark" placeholder="0.00" value="" maxlength="4"/>
            </div> 
        </div>           
</template>
<script>
export default {
    data() {
        return {
            state: 'normal'

        }
    },

    methods: {
        changeState: function(newState) {
            this.state = newState;
        }
    }
    
}
</script>
<style>

    .star {
        font-size: 1.2rem;
        cursor: pointer;
    }

    .box {
        width: 100%;
        background-color: rgba(255, 255, 255, 0.4);
        font-weight: bold;
        font-size: 0.7rem;
        position: relative;
        margin-bottom: 1.7rem;
        opacity: 0.8;
        color: #000;
    }

    .box:before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -11px;
        left: 0;
        border-bottom: 11px solid rgba(255, 255, 255, 0.4);;
        border-left: 20px solid #eee0;
        border-right: 20px solid #eee0;
    }



    .box:after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -11px;
        left: 0;
        border-top: 11px solid rgba(255, 255, 255, 0.4);;
        border-left: 20px solid #eee0;
        border-right: 20px solid #eee0;
    }

    .odd-display {
        width: 60%;
        background: #326BAB; 
        border-radius: 30px; 
        z-index: 1;
        padding: 0.4rem 0;
    }
    .input-odd {
        width: 15%;
        border-radius: 30px;
        background-color: #BFC0C0; 
        z-index: 1;
    }
   
</style>


