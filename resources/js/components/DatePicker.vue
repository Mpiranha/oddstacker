<template>
    <div class="row m-0 mt-2 bg-purple p-2 cal-font">
        <div class="col-2">
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
        </div>
        <div class="col-8 text-center">
            <i class="far fa-calendar-alt"></i> {{ today }}
        </div>
        <div class="col-2">
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>

</template>
<script>
import moment from 'moment'
export default {
    data: function(){
        return {}
    },

    computed: {
        today: function(){
            return moment().format('LL')
        }
    }
}
</script>

<style>

</style>

