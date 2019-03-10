<template>
    <table class="table text-light">
        <thead>
            <tr class="h5">
                <th scope="col" class="border-0 f-0-6">POS.</th>
                <th scope="col" class="border-0 f-0-6">USERNAME</th>
                <th scope="col" class="border-0 f-0-6">SCORE</th>
                <th scope="col" class="border-0 f-0-6 text-right">Won(NGN)</th>
            </tr>
        </thead>

        <tbody>
            <tr class="f-0-6"  v-for="data in userdetails" :key="data.user_id">
                <th class="border-0" scope="row">{{ data.user_id }}</th>
                <td class="border-0">{{ data.user_name }}</td>
                <td class="border-0">{{ data.score }}</td>
                <td class="border-0 text-center">{{ data.won }}</td>
            </tr>
        </tbody>
    </table>
  
</template>
<script>
export default {
    data() {
        return {
            userdetails: [
                { user_id: 1, user_name: "Mesh", score: 50, won: "50 + 70" },
                { user_id: 2, user_name: "Ike", score: 100 + 500, won: "50" },
                { user_id: 3, user_name: "Mesh", score: 50, won: "50 + 70" },
                { user_id: 4, user_name: "Ike", score: 100 + 500, won: "50" },
                { user_id: 5, user_name: "Mesh", score: 50, won: "50 + 70" },
                { user_id: 6, user_name: "Ike", score: 100 + 500, won: "50" },
                { user_id: 7, user_name: "Mesh", score: 50, won: "50 + 70" },
                { user_id: 8, user_name: "Ike", score: 100 + 500, won: "50" }
            ]
        }
    }
    
}
</script>
<style scoped>

    tbody tr:nth-child(1) th, tbody tr:nth-child(1) td:nth-child(4) {
        color: chartreuse;
    }

    tbody tr:nth-child(2) th, tbody tr:nth-child(2) td:nth-child(4) {
        color: chartreuse;
    }

    tbody tr:nth-child(3) th, tbody tr:nth-child(3) td:nth-child(4) {
        color: chartreuse;
    }

    tbody tr:nth-child(4) th, tbody tr:nth-child(4) td:nth-child(4) {
        color: chartreuse;
    }

    tbody tr:nth-child(5) th, tbody tr:nth-child(5) td:nth-child(4) {
        color: chartreuse;
    }

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

    .table th, .table td {padding: 0;}

    .table th, .table td{
    margin-bottom: 0;
    font-size: 0.9rem;
    }

    thead tr th {
        font-size: 0.8rem !important;
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

