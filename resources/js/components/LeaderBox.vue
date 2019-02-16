<template>
    <table class="table text-light">
        <thead>
            <tr class="h6">
                <th scope="col" class="border-0 f-0-6">POS.</th>
                <th scope="col" class="border-0 f-0-6">USERNAME</th>
                <th scope="col" class="border-0 f-0-6">SCORE</th>
                <th scope="col" class="border-0 f-0-6 text-right">TIE BREAKERS</th>
            </tr>
        </thead>

        <tbody>
            <tr class="f-0-6"  v-for="data in userdetails" :key="data.user_id">
                <th class="border-0" scope="row">{{ data.user_id }}</th>
                <td class="border-0">{{ data.user_name }}</td>
                <td class="border-0">{{ data.score }}</td>
                <td class="border-0 text-right text-yellow">
                    <span class="star" v-bind:class="{ 'star-visible' : data.starOneVisible }">
                        <i class="fas fa-star"></i>
                        <span>(1)</span>
                    </span>
                    <span class="star" v-bind:class="{ 'star-visible' : data.starTwoVisible }">
                            <i class="fas fa-star"></i>
                            <span>(2)</span>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
  
</template>
<script>
export default {
    data() {
        return {
            userdetails: [
                { user_id: 1, user_name: "Mesh", score: "50 + 70", starOneVisible: true, starTwoVisible: true },
                { user_id: 2, user_name: "Ike", score: "50", starOneVisible: true, starTwoVisible: false }
            ]
        }
    }
    
}
</script>
<style>

    .star {
        display: none;
    }

    .star-visible {
        display: inline;
    }

    table {
        border-collapse:separate;
        border-spacing: 0 1rem;
    }

    .box-curve {
        position: relative;
        z-index: 2;
    }

    .box-curve:before {
        content: "";
        width: 100%;
        height: 0;
        position: absolute;
        top: 7px;
        left: 0;
        z-index: 0;
        border-bottom: 12px solid rgba(35, 38, 41, 0.678);
        border-left: 15px solid #eee0;
        border-right: 15px solid #eee0;
    }



.box-curve:after {
    content: "";
    width: 100%;
    height: 0;
    position: absolute;
    bottom: 45px;
    left: 0;
    z-index: 0;
    border-top: 12px solid rgba(35, 38, 41, 0.678);
    border-left: 15px solid #eee0;
    border-right: 15px solid #eee0;
}


</style>

