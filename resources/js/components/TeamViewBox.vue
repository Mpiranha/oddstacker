<template>
    <div class="d-flex fancy-top-bot">
        <div class="d-flex star">
            <i class="fas fa-star mt-1"></i><span>(1)</span>
        </div>
        <div class="d-flex flex-column flex-grow-1">
            <div class="d-flex">
                <fancy-top-bottom content="Man U vs Liverpool" class="flex-grow-1 mr-3"></fancy-top-bottom>
                <div class="d-flex both-odds">
                    <span class="mr-3">0.1</span>
                    <span>0.2</span>
                </div>
            </div>
            
            <div class="d-flex mt-4">
                <div class="odds-text text-center text-white flex-grow-1">
                    BOTH HALVES UNDER 1.5
                </div>
                <div class="odd text-center pt-2 px-2">
                    2.99
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .star {
        font-size: 0.659rem;
        color: rgb(255, 215, 0);
        padding: 2rem 0.2rem;
    }
    .odds-text {
        background-color: rgba(245, 199, 11, 0.561);
        border-radius: 30px;
        padding: 0.7rem 1rem;
        font-size: 0.7rem;
    }
    .odd {
        padding: 0.4rem 1rem;
        background-color: rgba(12, 220, 78, 0.24);
        border-radius: 30px;
        margin-left: 2rem;
        border: 2px solid white;
        font-weight: bolder;
    }

    .both-odds {
        border-radius: 30px;
        padding: 0.3rem 0.3rem;
        background-color: rgba(128, 128, 128, 0.527);
        border: 2px solid white;
        color: white;
        font-size: 0.6rem;
        align-items: center;
        align-self: center;
    }

    .fancy-top-bot {
        width: 100%;
        height: 100px;
        background: #ffffff33;
        position: relative;
        margin-top: 2.5rem;
        padding: 0.4rem 0.3rem;
    }

    .fancy-top-bot:before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: -15px;
        left: 0;
        border-bottom: 15px solid #ffffff33;
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
    border-top: 15px solid #ffffff33;
    border-left: 15px solid #eee0;
    border-right: 15px solid #eee0;
    }
</style>
