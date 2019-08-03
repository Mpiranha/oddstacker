<template>
    <div>
        <div class="" v-if="shellOddsSharing">
            <div class="shell-box border-curve px-1 pt-0 pb-3 mt-4">
                <db-stackshell-box v-for="prediction in predictions" :key="prediction.id"
                                   :event-predictions="prediction"
                                   :stock="stock" v-on:alter-odd="oddChanged"></db-stackshell-box>
            </div>
            <div class="row mt-2">
                <div class="col-12 alert alert-danger" v-if="error_msg">
                    {{error_msg}}
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-success w-40 sexy-btn" @click="proceed">Proceed</button>
                    <div>To tie breaker selection</div>
                </div>
            </div>
        </div>
        <div class="" v-else>
            <div class="row">
                <div class="col-12 alert alert-info">
                    Select {{stock.category.tie_breaker}} matches as your tie breaker
                </div>
            </div>
            <div class="shell-box border-curve px-1 pt-0 pb-3 mt-4">
                <db-stackshell-tie-box v-for="prediction in predictions" :key="prediction.id"
                                       :event-predictions="prediction"
                                       :stock="stock" :selections="selections"
                                       v-on:alter-selection="selectionChanged"></db-stackshell-tie-box>
            </div>
            <div class="row mt-2">
                <div class="alert alert-danger" v-if="error_msg">
                    {{error_msg}}
                </div>
                <div class="col-12 alert alert-danger" v-if="error_msg">
                    {{error_msg}}
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-success w-40 sexy-btn" @click="submitStack"
                            :disabled="!(selections == this.stock.category.tie_breaker)">
                        Play with {{stock.stake | currency('&#8358;')}}
                    </button>
                    <div>Submit Your Stack Of Odds</div>
                </div>
            </div>

        </div>
        <span v-if="shellOddsSharing" class="flying-odd">
            <span class="txt">{{ odds }}</span>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['predictions', 'stock'],
        data(){
            return {
                error_msg: null,
                shellOddsSharing: true,
                selections: 0,
                odds: this.stock.category.odd
            }
        },
        created(){
//            console.log(this.stock.category)
        },
        methods: {
            roundTo(n, digits) {
                var negative = false;
                if (digits === undefined) {
                    digits = 0;
                }
                if (n < 0) {
                    negative = true;
                    n = n * -1;
                }
                var multiplicator = Math.pow(10, digits);
                n = parseFloat((n * multiplicator).toFixed(11));
                n = (Math.round(n) / multiplicator).toFixed(2);
                if (negative) {
                    n = (n * -1).toFixed(2);
                }
                return n;
            },
            oddChanged(){
                let usedOdds = 0;
                this.predictions.forEach((pred) => {
                    if (pred.odds > 0) {
                        usedOdds = Number(this.roundTo(usedOdds + Number(pred.odds, 10), 2))
                    }
                });

                this.odds = this.roundTo(this.stock.category.odd - usedOdds, 2)
            },
            submitStack(){
                axios.post(`/stock/lobby`, {selection: this.predictions})
                    .then((resp) => {
                        window.location.reload()
                    }).catch((err) => console.log(err))
            },
            selectionChanged(selection){
                if (selection === true) {
                    this.selections += 1;
                } else {
                    this.selections -= 1;
                }

            },
            checkingOdds(){
                let usedOdds = 0;
                this.predictions.forEach((pred) => {
                    if (pred.odds > 0) {
//                        console.log(usedOdds)
                        usedOdds = Number(this.roundTo(usedOdds + Number(pred.odds, 10), 2), 10)
                    }
                });

                console.log(`USED ODDS: ${usedOdds}`)

                return usedOdds;
            },
            oddsLimit(){
                for (let pred in this.predictions) {
                    if (this.predictions[pred].odds < 1.21 || this.predictions[pred].odds > 9.99) {
                        return false
                    }
                }

                return true
            },
            proceed(){
                if (this.checkingOdds() === Number(this.stock.category.odd)) {
                    if (this.oddsLimit()) {
                        this.error_msg = null
                        this.shellOddsSharing = false;


                    } else {
                        this.error_msg = 'All entered odds must be within 1.21 to 9.99'
                    }
                } else {
                    this.error_msg = 'Used odds must be exactly ' + Number(this.stock.category.odd)
                }
            }
        }
    }
</script>

<style scoped>
    .flying-odd {
        position: fixed;
        bottom: 25px;
        left: 10px;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        background: #F65C1A;
        border-radius: 50%;
        border: solid 1px #F65C1A;
        flex-direction: column;
    }

    .flying-odd .txt {
        color: #fff;
        font-size: 13px;
        text-align: center;
    }
</style>