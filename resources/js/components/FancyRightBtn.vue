<template>
    <div :class="{ activated: isActive }" class="fancy-right text-center flex-fill">
        {{content}}
    </div>
</template>

<script>
export default {
    props: {
        isActive: Boolean,
        content: String
    }
}
</script>

<style>
    .fancy-right {
        height: 30px;
        position: relative;
        background-color: rgb(255, 255, 255);
        margin-top: 1rem;
        padding-top: 0.1rem;
    }

    .activated {
        background-color: #ceb429 !important;
        color: white !important;
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
