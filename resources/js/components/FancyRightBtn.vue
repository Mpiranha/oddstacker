<template>
    <div class="fancy-right text-center flex-fill">
        ALL WINNERS
    </div>
</template>

<style>
    .fancy-right {
        height: 30px;
        position: relative;
        background-color: rgb(255, 255, 255);
        margin-top: 1rem;
    }
    .fancy-right::before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -9px;
        left: 0;
        border-bottom: 10px solid rgb(255, 255, 255);
        border-left: 15px solid rgb(255, 255, 255);
        border-right: 14px solid #eee0;
    }
</style>
