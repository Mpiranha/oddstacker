<template>
    <div>
        <date-picker></date-picker>

        <stack-nav class="mt-2"></stack-nav>
        <search-match-tab></search-match-tab>

        <div id="filter-bar" class="scroll-y">
            <button type="button" class="close-filter text-light" id="close-filter" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <input type="text" class="form-control" id="search-box" aria-describedby="searchHelp"
                   placeholder="Search Stock Lobby">

            <div class="filter-cat mt-5">
                <h1 class="filter-headers">FILTER BY CATEGORY</h1>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">HEAD tO HEAD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">DOUBLE UP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PREMIUM</a>
                    </li>
                </ul>
            </div>

            <div class="filter-type mt-5">
                <h1 class="filter-headers">FILTER BY SPORT</h1>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">FOOTBALL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">TENNIS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ICE HOCKEY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">BASKET BALL</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="stock-boxes-container">
            <stack-box v-for="stock in stocks" :stock="stock" :key="stock.id"></stack-box>
        </div>
    </div>
</template>

<script>
    export default {

        props: [],
        data(){
            return {
                stocks: []
            }
        },
        created(){
            this.getStack();
        },
        methods: {
            getStack(){
                axios.get('/api/stocks')
                    .then((resp) => {
                        this.stocks = resp.data;
                    }).catch((err) => console.log(err))
            }
        }
    }
</script>