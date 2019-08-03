<template>
    <div class="container-fluid">
         <div class="row mt-4">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="d-flex justify-content-center stack-lead-btn">
                        <a data-toggle="tab" href="#mystacks" id="my-stack" class="btn end end-left bg-grey text-dark btn-stack text-uppercase active">MY
                            STACK</a>
                        <a v-if="leaderBoard.length > 0" data-toggle="tab" href="#leader-board" id="leaderboard" class="btn end end-right bg-grey text-dark btn-lead text-uppercase">LEADERBOARD</a>
                        <a v-else data-toggle="tab" href="#leader-board" id="leaderboard" class="btn end end-right bg-grey text-dark btn-lead text-uppercase">ENTRIES</a>
                    </div>
                </div>
            </div>

            <div class="row my-3 px-3">
                <div class="col-12 border-curve pt-0">
                    <div class="tab-content">
                        <div id="mystacks" class="tab-pane active">
                            <team-view-box></team-view-box>

                            <team-view-box></team-view-box>

                            <team-view-box></team-view-box>

                            <team-view-box></team-view-box>

                            <team-view-box></team-view-box>

                            <team-view-box></team-view-box>
                        </div>
                        <div id="leader-board" class="tab-pane">
                            <leader-box></leader-box>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
export default {
    computed: {
        gameEntries() {
            return this.$store.state.gameEntries;
        },
        leaderBoard() {
            return this.$store.state.leaderboard;
        }
    }
}
</script>