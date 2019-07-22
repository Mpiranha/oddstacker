<template>
    <div id="fancy-top-bot" class="d-flex text-white justify-content-center">

        <div v-if="result ==  'true'" class="d-flex star star-result f-0-6 mt-2">
            <i class="fas fa-star mt-1"></i><span>(1)</span>
        </div>

        <div v-if="tieBreaker == 'true'" class="star">
            <i v-if="state === 'normal'" @click="changeState('highlighted')" class="far fa-star text-light"></i>
            <i v-else @click="changeState('normal')" class="fas fa-star text-yellow"></i>
        </div>

        
            {{content}}
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
    },
    props: {
        content: String,
        tieBreaker: String,
        result: String
    }
}
</script>


<style>
     #fancy-top-bot {
        width: 100%;
        height: 24px;
        background: rgba(0, 0, 0, 0.54);
        position: relative;
        margin-top: 0.5rem;
        font-size: 1rem;
    }

    #fancy-top-bot:before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -8px;
        left: 0;
        border-bottom: 8px solid rgba(0, 0, 0, 0.54);
        border-left: 15px solid rgba(238, 238, 238, 0);
        border-right: 15px solid rgba(238, 238, 238, 0);
    }  

    #fancy-top-bot:after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -8px;
        left: 0;
        border-top: 8px solid rgba(0, 0, 0, 0.54);
        border-left: 15px solid rgba(238, 238, 238, 0);
        border-right: 15px solid rgba(238, 238, 238, 0);
    }

    .star {
        position: absolute;
        padding: 0.5rem;
        font-size: 1.3rem;
        cursor: pointer;
        left: 5px;
        top: -50%;
    }

    .star-result {
        cursor: none;
        color: rgb(255, 215, 0);
    }
</style>