<template>
    <div class="row mt-2">
        <div class="col-12">
            <div class="d-flex stock-nav justify-content-center">
                <div @click="changeState( true, false, false)" :class="{ 'head-active': headActive }" class="px-3 fancy-left text-center mr-2 flex-fill bold-1">
                    {{leftContent}}
                </div>

                <div @click="changeState( false, true, false)" :class="{ 'double-active': doubleActive }"  class="stock-all text-center bg-white mr-2 flex-fill bold-1">
                    {{ centerContent }}
                </div>

                <div @click="changeState( false, false, true)" :class="{ 'premium-active': premiumActive }" class="fancy-right text-center flex-fill bold-1">
                    {{ rightContent }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        leftContent: String,
        centerContent: String,
        rightContent: String
    },
    data() {
        return {
            headActive: true,
            doubleActive: false,
            premiumActive: false
        }
    },
    methods: {
        changeState: function(headState, doubleState, premiumState) {
            this.headActive = headState;
            this.doubleActive = doubleState;
            this.premiumActive = premiumState;
        }
    }
}
</script>

<style scoped>

    /* Fancy Left button */

    .fancy-left {
        content: "";
        height: 30px;
        position: relative;
        background-color: rgb(255, 255, 255);
        margin-top: 1rem;
        padding-top: 0.1rem;
    }

    


    .fancy-left::before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -8px;
        left: 0;
        border-bottom: 9px solid rgb(255, 255, 255);
        border-left: 10px solid #eeeeee00;
        border-right: 15px solid rgb(255, 255, 255);
    }


    .head-active {
        background-color: #e50101 !important;
        color: white !important;
    }

    .head-active::before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -8px;
        left: 0;
        border-bottom: 9px solid rgb(229, 1, 1);
        border-left: 10px solid #eeeeee00;
        border-right: 15px solid rgb(228, 1, 1);
    }



    /* End of fancy left button */
    .stock-all {
        margin-top: 0.45rem;
        padding-top: 0.7rem;
        height: 39px;
    }

    .stock-nav {
        font-size: 0.7rem;
    }

    .stock-nav .double-active {
        background-color: #0b5cc7 !important;
        color: white;
    }

    /* Fancy Right button */

        .fancy-right {
        height: 30px;
        position: relative;
        background-color: rgb(255, 255, 255);
        margin-top: 1rem;
        padding-top: 0.1rem;
    }

    
    .fancy-right::before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -9px;
        left: 0;
        border-bottom: 10px solid rgb(255, 255, 255);
        border-left: 15px solid rgb(255, 255, 255);
        border-right: 14px solid #eee0;
    }

    .premium-active {
        background-color: rgb(206, 180, 41) !important;
        color: white !important;
    }

    .premium-active::before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -9px;
        left: 0;
        border-bottom: 10px solid rgb(206, 180, 41);
        border-left: 15px solid rgb(206, 180, 41);
        border-right: 14px solid #eee0;
    }
    /* End Of fancy right button */
</style>

