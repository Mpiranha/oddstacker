<template>
    <div id="fancy-top-bot">
        
    </div>
</template>

<style>
     #fancy-top-bot {
      width: 200px;
      height: 20px;
      background: red;
      position: relative;
      margin-top: 50px;
    }

    #fancy-top-bot:before {
        content: "";
        width: 200px;
        height: 0;
        position: absolute;
        top: -14px;
        left: 0;
        border-bottom: 15px solid red;
        border-left: 15px solid #eee0;
        border-right: 15px solid #eee0;
    }  

    #fancy-top-bot:after {
    content: "";
    width: 200px;
    height: 0;
    position: absolute;
    bottom: -14px;
    left: 0;
    border-top: 15px solid red;
    border-left: 15px solid #eee0;
    border-right: 15px solid #eee0;
    }  
</style>