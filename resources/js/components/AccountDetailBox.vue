<template>
     <div class="container px-0 mt-3">   
        <div class="box-2 d-flex justify-content-between">
            <div class="active-circle">
            </div>
            <div class="card-type-icon">
                UBA
            </div>

            <div class="account-number">
                <span>****978</span>
            </div>

            <i class="fas fa-ellipsis-v mr-2 text-light"></i>

        </div>            
    </div>
   
</template>
<script>
export default {
    
    
}
</script>
<style scoped>

    .card-type-icon {
        max-height: 16px;
        background-color: orange;
        color: yellow; 
        font-size: 0.5rem;
        text-align: center;
        padding: 0.1rem 0.5rem;
        margin-bottom: 0.2rem;
        border: 0.9px solid white;
        margin-right: 5rem;
    }

    .account-number {
        margin-right: 2rem;
    }

    .active-circle {
        width: 10px;
        height: 10px;
        margin-left: 0.6rem;
        border-radius: 50%;
        border: 1px solid rgb(221, 228, 240);
    }
    .box-2 {
        width: 100%;
        position: relative;
        margin-bottom: 1rem;
        z-index: 1;
        font-size: 0.6rem;
        max-height: 20px;
        min-height: 20px;
    }

    .box-2:before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -11px;
        left: 0;
        z-index: -1;
        opacity: 0.8;
        border-bottom: 16px solid rgba(50, 55, 65, 0.65);
        border-left: 15px solid #eee0;
        border-right: 15px solid #eee0;
    }



    .box-2:after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -1px;
        opacity: 0.8;
        left: 0;
        z-index: -1;
        border-top: 16px solid rgba(50, 55, 65, 0.65);
        border-left: 15px solid #eee0;
        border-right: 15px solid #eee0;
    }

    .sub-head{
        line-height: 48px;
        z-index: 1;
    }
</style>

