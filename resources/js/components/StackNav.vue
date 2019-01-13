<template>
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-row justify-content-center flex-wrap mb-3">
                <div class="p-2 bg-white mr-1">
                    <a class="nav-link bg-white active text-dark" data-toggle="pill" href="#home">ALL</a>
                </div>
                <div class="p-2 bg-white mr-1">
                    <a class="nav-link bg-white text-dark" data-toggle="pill" href="#menu1">HEAD TO HEAD</a>
                </div>
                <div class="p-2 bg-white mr-1">
                    <a class="nav-link bg-white text-dark" data-toggle="pill" href="#menu2">DOUBLE UP</a>
                </div>
                <div class="p-2 bg-white">
                    <a class="nav-link bg-white text-dark" data-toggle="pill" href="#menu2">PREMIUM</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>

<style scoped>

    .nav-link {
        font-size: 0.7rem;
        border-radius: 0;
        font-weight: 700;
    }


    .nav-pills .active {
    background-color: black !important;
    color: white !important;
    border-radius: 0;
}

    .nav-link {
        display: block;
        padding: .3rem .4rem;
    }

    .nav-item {
        font-size: 0.6rem;
    }

@media screen and (max-width: 360px) {

}
</style>


