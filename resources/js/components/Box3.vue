<template>
    <div class="fancy-left">
        
    </div>
</template>

<style>

    .fancy-left {
        content: "";
        width: 200px;
        height: 50px;
        position: relative;
        background-color: red;
        margin-top: 100px;
    }
    .fancy-left::before {
        content: "";
        width: 200px;
        height: 0;
        position: absolute;
        top: -14px;
        left: 0;
        border-bottom: 15px solid red;
        border-left: 20px solid #eeeeee00;
        border-right: 15px solid red;
    }
</style>
