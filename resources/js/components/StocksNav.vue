<template>
    <div class="row mt-2">
        <div class="col-12">
            <div class="d-flex stock-nav justify-content-center">
                <left-fancy-box class="active"></left-fancy-box>
                <div class="stock-all text-center bg-white mr-2 flex-fill">ALL STOCKS</div>
                <right-fancy-box></right-fancy-box>
                
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>

<style scoped>
    .stock-all {
        margin-top: 0.45rem;
        padding-top: 0.5rem;
        height: 39px;
    }

    .stock-nav {
        font-size: 0.7rem;
    }

    .stock-nav .active {
        background-color: #e50101 !important;
        color: white;
    }
</style>

