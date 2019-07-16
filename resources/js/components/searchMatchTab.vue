<template>
    <div class="row">
        <div class="col-12">
            <div v-if="currentActiveBtn[0].allActive">
                <form action="" method="get">
                    <div class="d-flex mb-1">
                        <div class="d-flex search-container px-0">
                            <div class="search-bar flex-grow-1">
                                <input type="text" class="form-control mr-1" value="" placeholder="Search">
                            </div>
                            <div class="search-btn ml-2 align-self-center">
                                <button class="btn clear-bg b-0">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <select class="form-control w-30 ml-2" name="sort-sport" id="sort-sport">
                            <option selected>Sports</option>
                            <option value="football">Football</option>
                            <option value="basketball">Basketball</option>
                            <option value="icehockey">Ice Hockey</option>
                            <option value="tennis">Tennis</option>
                        </select>
                    </div>
                    
                </form>

                <div id="hot-stocks">
                        <a class="d-flex text-light cus-bg-red" data-toggle="collapse" href="#collapseHotstocks">
                            <div class="p-1">
                                <i class="fas fa-fire-alt mr-1 starting-soon-ball"></i> Hot Stocks
                            </div>
                        </a>
                        <div id="collapseHotstocks" class="collapse show" data-parent="#hot-stocks">
                             <stack-box></stack-box>
                        </div>
                </div>

            </div>

            <div v-else-if="matchStartingSoon.length > 0">
                <div id="start-soon">
                        <a class="d-flex text-light cus-bg-red" data-toggle="collapse" href="#collapseStartSoon">
                            <div class="p-1">
                                <i class="far fa-futbol mr-1 starting-soon-ball"></i> Starting Soon
                            </div>
                        </a>
                        <div id="collapseStartSoon" class="collapse show" data-parent="#start-soon">
                             <stack-box></stack-box>
                        </div>
                </div>
            </div>

            <div v-if="!currentActiveBtn[0].allActive" class="mt-1">
                <div id="football">
                        <a class="d-flex f-0-9 cus-bg-black text-light" data-toggle="collapse" href="#collapseFootball">
                            <div class="p-1">
                                <i class="far fa-futbol mr-1"></i> Football
                            </div>
                        </a>
                        <div id="collapseFootball" class="collapse show" data-parent="#football">
                            <stack-box></stack-box>

                            <div id="predictions">
                                <a class="d-flex text-light football-comp-bg" data-toggle="collapse" href="#collapsePrediction">
                                    <div class="p-1">
                                        <i class="far fa-chart-bar mr-1"></i> Prediction
                                    </div>
                                </a>
                                <div id="collapsePrediction" class="collapse show" data-parent="#predictions">
                                    <stack-box></stack-box>
                                </div>
                            </div>
                            <div id="league">
                                <a class="d-flex text-light football-comp-bg" data-toggle="collapse" href="#collapseLeague">
                                    <div class="p-1">
                                        <i class="fas fa-flag-checkered mr-1"></i> League
                                    </div>
                                </a>
                                <div id="collapseLeague" class="collapse show" data-parent="#league">
                                    <stack-box></stack-box>
                                </div>
                            </div>
                            <div id="matches">
                                <a class="d-flex text-light football-comp-bg" data-toggle="collapse" href="#collapseMatches">
                                    <div class="p-1">
                                        <i class="fas fa-gamepad mr-1"></i> Matches
                                    </div>
                                </a>
                                <div id="collapseMatches" class="collapse show" data-parent="#matches">
                                    <stack-box></stack-box>
                                </div>
                            </div>
                        </div>
                </div>
                
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        currentActiveBtn() {
             return this.$store.state.btnState;
        },
        matchStartingSoon() {
            return this.$store.state.matchStartingSoon;
        }
    }
}
</script>

<style scoped>
    .search-bar input {
        background-color: rgba(128, 128, 128, 0);
         outline: none;
        border: none;
        color: rgb(255, 255, 255);
        height: 90%;
    }

    .search-bar input:focus {
        box-shadow: none;
    }


    .search-container {
        background-color: rgba(14, 13, 13, 0.374);
        border-radius: 30px;
        padding: 0 .7rem;
        border: 1px solid rgb(255, 255, 255);
        width: 70%;
    }
    .search-btn {
        font-size: 1.2rem;
    }
    .cus-bg-red {
        background-color: rgb(255, 32, 32);
    }
    
    .starting-soon-ball {
        animation: jump 1s infinite;
    }

    .football-comp-bg {
        background-color: rgb(22, 56, 86);
    }

    @keyframes jump {
        from { transform: translateY(0)}
        to {transform: translateY(-10px)}
    }
</style>

