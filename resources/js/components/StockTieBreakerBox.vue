<template>
    <div class="fancy-top-bot px-3">
        <div class="d-flex flex-column flex-grow-1">
            <div class="d-flex">
                <input type="checkbox" v-model="eventPredictions.tie_breaker" @change="selected($event)">
                <fancy-top-bottom
                        :content="`${eventPredictions.event.team_a.name} vs ${eventPredictions.event.team_b.name}`"
                        class="flex-grow-1 mr-5"></fancy-top-bottom>
            </div>

            <div class="d-flex mt-4">
                <div class="odds-text text-center text-white flex-grow-1 d-flex justify-content-center">
                    <span class="odds-text-content align-self-center">
                        {{ eventPredictions.prediction.name }}
                    </span>
                </div>
                <input type="tel" class="shell-odd-input text-center text-dark pt-2 px-2"
                       v-model="eventPredictions.odds" maxlength="5" readonly>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['stock', 'eventPredictions', 'selections'],
        data(){
            return {}
        },
        computed: {
            selectionCheck(){
                if(this.selections > this.stock.category.tie_breaker){
                    return true
                }else{
                    return false
                }
            }
        },
        created(){

        },
        methods: {
            selected(event){
                this.$emit('alter-selection', event.target.checked)

                setTimeout(() => {
                    if(this.selectionCheck){
                        event.target.checked = false
                        this.$emit('alter-selection', event.target.checked)
                    }
                }, 400)
            }
        }
    }

</script>

<style scoped>
    .star {
        font-size: 0.659rem;
        color: rgb(255, 215, 0);
        padding: 2rem 0.2rem;
    }

    .odds-text {
        position: relative;
        background-color: rgba(245, 199, 11, 0.561);
        border-radius: 30px;
        padding: 0.4rem 1rem;
        font-size: 0.8rem;
    }

    .shell-odd-input {
        width: 25%;
        padding: 0.4rem 1rem;
        background-color: rgb(255, 255, 255);
        border-radius: 30px;
        margin-left: 2rem;
        border: none;
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
</style>
