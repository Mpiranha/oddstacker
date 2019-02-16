<template>

     <div class="container px-0">   
        <div class="box-2">
          <h1 class="sub-head text-center text-uppercase text-light f-1">{{ title.toLocaleUpperCase() }}</h1> 
  
        </div>            
    </div>
   
</template>
<script>
export default {
    props:{
        title:String
    }
    
    
}
</script>
<style>
    .box-2 {
        display: flex;
        justify-content: center; 
        width: 100%;
        font-weight: 500;
        position: relative;
        margin-bottom: 0.9rem;
    }

    .box-2:before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: 8px;
        left: 0;
        opacity: 0.8;
        border-bottom: 16px solid #18335F;
        border-left: 15px solid #eee0;
        border-right: 15px solid #eee0;
    }



    .box-2:after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: 24px;
        opacity: 0.8;
        left: 0;
        border-top: 16px solid #18335F;
        border-left: 15px solid #eee0;
        border-right: 15px solid #eee0;
    }

    .sub-head{
        line-height: 48px;
        z-index: 1;
    }
</style>

