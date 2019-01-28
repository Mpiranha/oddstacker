<template>
    <div class="d-flex flex-column fancy-top-bot">
        <div class="d-flex">
            <fancy-top-bottom class="flex-grow-1 mr-3"></fancy-top-bottom>
            <div class="d-flex both-odds">
                <span class="mr-3">0.1</span>
                <span>0.2</span>
            </div>
        </div>
        
        <div class="d-flex mt-2">
            <div class="odds-text text-center text-white flex-grow-1">
                Under 2.5
            </div>
            <div class="odd">
            </div>
        </div>
    </div>
</template>

<style scoped>
    .odds-text {
        background-color: #ffff00a3;
        border-radius: 30px;
        padding: 0.5rem 1rem;
    }
    .odd {
        padding: 1rem 2rem;
        background-color: #1d7e00ad;
        border-radius: 30px;
        margin-left: 3rem;
        border: 2px solid white;
    }

    .both-odds {
        border-radius: 30px;
        padding: 0.5rem 1.1rem;
        background-color: rgba(128, 128, 128, 0.527);
        border: 2px solid white;
    }

    .fancy-top-bot {
      width: 100%;
      height: 100px;
      background: #ffffff85;
      position: relative;
      margin-top: 2.5rem;
      padding: 0.2rem 2.5rem;
    }

    .fancy-top-bot:before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -15px;
        left: 0;
        border-bottom: 15px solid #ffffff85;
        border-left: 15px solid #eee0;
        border-right: 15px solid #eee0;
    }  

    .fancy-top-bot:after {
    content: "";
    width: 100%;
    height: 0;
    position: absolute;
    bottom: -15px;
    left: 0;
    border-top: 15px solid #ffffff85;
    border-left: 15px solid #eee0;
    border-right: 15px solid #eee0;
    }
</style>
