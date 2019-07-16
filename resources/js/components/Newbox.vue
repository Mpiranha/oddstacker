<template>  
        <div class="box">
            <div class="d-flex justify-content-around">
                <div class="odd-display text-center text-uppercase text-light">
                    under 2.5
                </div> 
                <input id="oddbox" type="text" class="input-odd b-0 text-center px-3 text-dark" placeholder="0.00" value="" maxlength="4"/>
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
    }
    .box {
        width: 100%;
        background-color: rgba(255, 255, 255, 0.4);;
        font-weight: bold;
        font-size: 0.7rem;
        position: relative;
        margin-bottom: 1.7rem;
        opacity: 0.8;
        color: #000;
    }

    .box:before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -10px;
        left: 0;
        border-bottom: 10px solid rgba(255, 255, 255, 0.4);;
        border-left: 20px solid #eee0;
        border-right: 20px solid #eee0;
    }



    .box:after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -10px;
        left: 0;
        border-top: 10px solid rgba(255, 255, 255, 0.4);;
        border-left: 20px solid #eee0;
        border-right: 20px solid #eee0;
    }

    .odd-display {
        width: 60%;
        background: #326BAB; 
        border-radius: 30px; 
        z-index: 1;
        padding: 0.4rem 0;
        font-size: .85rem;
    }
    .input-odd {
        width: 20%;
        border-radius: 30px;
        background-color: rgb(255, 255, 255); 
        z-index: 1;
    }
   
</style>


