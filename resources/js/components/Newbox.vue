<template>
    <div class="container">   
            <div class="box">
                <div class="raw">
                    <div class="yellow text-center text-uppercase text-light">
                            under 2.5
                    </div> 
                    <input id="oddbox" type="text" class="green b-0 text-center text-uppercase text-dark" placeholder="0.00" value="" maxlength="4"/>
                </div> 
            </div>           
    </div> 
</template>
<script>
export default {

    
}
</script>
<style>
    .raw{
        display: flex;
        justify-content: space-around;
        height: 36px;
    }
    .box {
        width: 100%;
        height: 39px;
        background-color: #fff;
        font-weight: bold;
        font-size: 20px;
        line-height: 38px;
        position: relative;
        margin-top: 33px;
        opacity: 0.8;
        color: #000;
    }

    .box:before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -14px;
        left: 0;
        border-bottom: 15px solid #fff;
        border-left: 20px solid #eee0;
        border-right: 20px solid #eee0;
    }



    .box:after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: 38px;
        left: 0;
        border-top: 15px solid #fff;
        border-left: 20px solid #eee0;
        border-right: 20px solid #eee0;
    }

    .yellow{
        width: 60%;
        background: #326BAB; 
        border-radius: 30px; 
        z-index: 1;

    }
    .green{
        width: 15%;
        border-radius: 30px;
        background-color: #BFC0C0; 
        z-index: 1;
    }
   
</style>


