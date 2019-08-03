<style>
    .custom-datepicker {
        padding: 0 !important;
        background-color: rgba(29, 6, 6, 0) !important;
        border: none;
        width: 70%;
    }

    .datepickerinput {
        background-color: rgba(29, 6, 6, 0) !important;
        border: none;
        text-align: center;
        font-size: 1.2rem;
        color: rgb(246, 239, 239);
    }

    .datepickerinput:focus {
        color:  rgb(246, 239, 239) !important;
        border: none !important;
        outline: none !important;
        border: none !important;
    }

    .calender-style {
        background-color: #073453;
        color: #073453;
    }

    .calender-style header {
        background-color: aqua;
    }

    .bg-date {
        background-color: rgb(30, 78, 121);
    }
    .input-group-text {
        background-color: rgba(238, 238, 238, 0);
         border: none;
         color: rgb(255, 255, 255);
    }

    .vdp-datepicker__calendar header span {
    display: inline-block;
    text-align: center;
    width: 71.42857142857143%;
    float: left;
    background-color: #1e4e79;
    color: white !important;
    padding: 1rem 0rem !important;
    font-size: 1.4rem !important;
}







</style>

<template>

    
    <div class="d-flex justify-content-center m-0 mt-2 bg-date pb-1 px-2 cal-font">

        <datepicker
        v-model="selectedDate" :bootstrap-styling="true"
        class="form-control custom-datepicker"
        format="D, dd MM yyyy"
        input-class="datepickerinput"
        wrapper-class="datepicker-container"
        calendar-class="calender-style"
        :calendar-button="true"
        calendar-button-icon="far fa-calendar-alt"
        >
        </datepicker>
<!-- 
        <datepicker v-model="this.state.date"></datepicker> -->

        <!-- <datepicker v-model="selectedDate" :bootstrap-styling="true"
               class="form-control">
     </datepicker> -->

        <!-- <div class="col-12 md-form">
            <input placeholder="dd/mm/yyyy" v-model="dateValue" type="text" id="date-picker-example" class="form-control datepicker">

            
        </div> -->
        
        <!-- <div class="col-2">
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
        </div>
        <div class="col-8 text-center">
            <i class="far fa-calendar-alt"></i> Mon 05 June 2018
            <i class="far fa-calendar-alt"></i> {{ today }}
        </div>
        <div class="col-2">
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div> -->
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


<script>

import Datepicker from 'vuejs-datepicker';
// import Datepicker from 'vue-material-datepicker';



// .$mount('#app')

export default {
    components: {
        Datepicker
    },
    // ...
//   components: {
//     Datepicker
//   },

//   state: {
//       date: new Date().getFullYear() + '-' + (new Date().getMonth()+1) + '-' + new Date().getDate()
//   }
    data () {
    return {
          selectedDate: new Date().getFullYear() + '-' + (new Date().getMonth()+1) + '-' + new Date().getDate()
    }
  },
  methods: {
  }
  // ...
}
</script>

