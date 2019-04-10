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
            </div>

            <div v-else-if="matchStartingSoon.length> 0" class="cus-bg-red">
                <div class="d-flex text-light">
                    <div class="p-2">
                        <i class="far fa-futbol mr-1 starting-soon-ball"></i> Starting Soon
                    </div>
                </div>
            </div>

            <div v-if="!currentActiveBtn[0].allActive" class="cus-bg-black">
                <div class="d-flex">
                    <div class="p-2">
                        <i class="far fa-futbol mr-1"></i> Football
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
        background-color: red;
    }
    
    .starting-soon-ball {
        animation: jump 1s infinite;
    }

    @keyframes jump {
        from { transform: translateY(0)}
        to {transform: translateY(-10px)}
    }
</style>

