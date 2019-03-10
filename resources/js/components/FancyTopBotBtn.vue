<template>
    <div id="fancy-top-bot" class="text-center text-white">
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
     #fancy-top-bot {
        width: 100%;
        height: 20px;
        background: rgba(0, 0, 0, 0.741);
        position: relative;
        margin-top: 0.5rem;
        font-size: 1rem;
    }

    #fancy-top-bot:before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -11px;
        left: 0;
        border-bottom: 11px solid rgba(0, 0, 0, 0.741);
        border-left: 15px solid rgba(238, 238, 238, 0);
        border-right: 15px solid rgba(238, 238, 238, 0);
    }  

    #fancy-top-bot:after {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        bottom: -11px;
        left: 0;
        border-top: 11px solid rgba(0, 0, 0, 0.741);
        border-left: 15px solid rgba(238, 238, 238, 0);
        border-right: 15px solid rgba(238, 238, 238, 0);
    }
</style>