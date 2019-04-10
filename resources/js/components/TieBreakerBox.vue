<template>
    <div class="d-flex fancy-top-bot">
        <div class="h-100 mt-3 star">
            <i v-if="state === 'normal'" @click="changeState('highlighted')" class="far fa-star text-light "></i>
            <i v-else @click="changeState('normal')" class="fas fa-star text-yellow"></i>
        </div>
        <div class="d-flex flex-column justify-content-between flex-grow-1">
            <div class="d-flex">
                <fancy-top-bottom content="Man U vs Liverpool" class="flex-grow-1 mr-2"></fancy-top-bottom>
            </div>
            
            <div class="d-flex mt-2">
                <div class="odds-text d-flex justify-content-center align-items-center text-white flex-grow-1">
                    Under 2.5
                </div>
                <input class="shell-odd-input text-center text-light pt-2 px-2" readonly type="text" placeholder="0.00" value="" maxlength="4">
            </div>
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
        changeState: function (newState) {
            this.state = newState;
        }
    }
}
</script>

<style scoped>
    .odds-text {
        background-color: rgba(245, 199, 11, 0.561);
        border-radius: 30px;
        padding: 0.4rem 1rem;
        font-size: 0.8rem;
    }
    .shell-odd-input {
        width: 25%;
        padding: 0.4rem 1rem;
        background-color: rgba(12, 220, 78, 0.24);
        border-radius: 30px;
        margin-left: 2rem;
        border: 2px solid white;
        font-weight: bolder;
        display: block;
    }


    .fancy-top-bot {
        width: 100%;
        height: 100px;
        background: #ffffff33;
        position: relative;
        margin-top: 2.2rem;
        padding: 0.4rem 0.3rem;
    }

    .fancy-top-bot:before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -15px;
        left: 0;
        border-bottom: 15px solid #ffffff33;
        border-left: 15px solid #eee0;
        border-right: 15px solid #eee0;
    }  

    .fancy-top-bot:after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -15px;
        left: 0;
        border-top: 15px solid #ffffff33;
        border-left: 15px solid #eee0;
        border-right: 15px solid #eee0;
    }
    .star {
        padding: 0.5rem;
        font-size: 1.7rem;
        cursor: pointer;
    }
</style>
