<template>
    <div class="fancy-top-bot px-3">
        <div class="d-flex flex-column flex-grow-1">
            <div class="d-flex">
                <fancy-top-bottom content="Man U vs Liverpool" class="flex-grow-1 mr-5"></fancy-top-bottom>
            </div>
            
            <div class="d-flex mt-4">
                <div class="odds-text text-center text-white flex-grow-1">
                    BOTH HALVES UNDER 1.5
                </div>
                <input class="shell-odd-input text-center text-light pt-2 px-2" type="text" placeholder="0.00" value="" maxlength="4">
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
        padding: 0.4rem 1rem;
        font-size: 0.6rem;
    }
    .shell-odd-input {
        width: 25%;
        padding: 0.4rem 1rem;
        background-color: rgba(12, 220, 78, 0.24);
        border-radius: 30px;
        margin-left: 2rem;
        border: 2px solid white;
        font-weight: bolder;
        display: block;
    }


    .fancy-top-bot {
        width: 100%;
        height: 100px;
        background: #ffffff33;
        position: relative;
        margin-top: 2.2rem;
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
