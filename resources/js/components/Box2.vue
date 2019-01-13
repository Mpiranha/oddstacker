<template>
    <div class="fancy-right">
        
    </div>
</template>

<style>
    .fancy-right {
        width: 200px;
        height: 50px;
        position: relative;
        background-color: red;
        margin-top: 100px;
    }
    .fancy-right::before {
        content: "";
        width: 200px;
        height: 0;
        position: absolute;
        top: -14px;
        left: 0;
        border-bottom: 15px solid red;
        border-left: 15px solid red;
        border-right: 20px solid #eee0;
    }
</style>
