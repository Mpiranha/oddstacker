<template>
    <div id="fancy-left-btn" class="px-3 fancy-left text-center mr-2 flex-fill">
        {{content}}
    </div>
</template>

<script>
export default {
    props: {
        content: String
    }
}
</script>


<style>

    .fancy-left {
        content: "";
        height: 30px;
        position: relative;
        background-color: rgb(255, 255, 255);
        margin-top: 1rem;
    }
    .fancy-left::before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -8px;
        left: 0;
        border-bottom: 9px solid rgb(255, 255, 255);
        border-left: 10px solid #eeeeee00;
        border-right: 15px solid rgb(255, 255, 255);
    }

    .fancy-left.active::before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -8px;
        left: 0;
        border-bottom: 9px solid rgb(229, 1, 1);
        border-left: 10px solid #eeeeee00;
        border-right: 15px solid rgb(228, 1, 1);
    }
</style>
