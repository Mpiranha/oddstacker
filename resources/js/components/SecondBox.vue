<template>

     <div class="container">   
        <div class="box-2">
          <h1 class="sub-head text-center text-uppercase text-light">{{title}}</h1> 
  
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
        height: 33px;
        font-weight: 500;
        font-size: 28px;
        position: relative;
        margin-top: 33px;
        margin-bottom: 70px;
    }

    .box-2:before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -6px;
        left: 0;
        opacity: 0.8;
        border-bottom: 30px solid #18335F;
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
        border-top: 30px solid #18335F;
        border-left: 15px solid #eee0;
        border-right: 15px solid #eee0;
    }

    .sub-head{
        line-height: 48px;
        z-index: 1;
    }
</style>

