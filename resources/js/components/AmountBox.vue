<template>
    <div class="another-shape">
        {{ amount }}
    </div>

</template>

<script>
export default {
    props: {
    amount: String
}
}
</script>


<style>
    .another-shape {
        height: 10px;
        position: relative;
        z-index: 1;
        background-color: red;
    }

    .another-shape::before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        z-index: 0;
        border-bottom: 10px solid red;
        border-right: 15px solid #eee0;
        top: -10px;
        left: 0;  
     }
    .another-shape::after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -10px;
        left: 0;
        z-index: -1;
        border-top: 10px solid red;
        border-left: 15px solid #eee0;
        border-right: 15px solid red;
     }
</style>

