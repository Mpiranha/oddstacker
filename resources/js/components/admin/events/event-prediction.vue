<template>
  <div>
    <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th class="">Name</th>
              <th class="">Alias</th>
              <th class="">Rating</th>
              <th class="">Rated</th>
          </thead>
          <tbody v-if="this.values.length > 0">
              <tr v-for="(ft, i) in values" :key="i" :value="ft.id">
                  <td class="">
                    {{ft.prediction.name}}
                  </td>
                  <td class="">
                    {{ft.prediction.alias}}
                  </td>
                  <td>
                    <div>
                      <i class="fa fa-star grey cursor scale" aria-hidden="true" title="Undefined"
                      @click="rate(ft.id, 'undefined')"></i>
                      <i class="fa fa-star red cursor scale" aria-hidden="true" title="UnLikely" 
                      @click="rate(ft.id, 'unlikely')"></i>
                      <i class="fa fa-star blue cursor scale" aria-hidden="true" title="Fifty Fifty"
                      @click="rate(ft.id, 'fifty')"></i>
                      <i class="fa fa-star green cursor scale" aria-hidden="true" title="Likely"
                      @click="rate(ft.id, 'likely')"></i>
                    </div>
                  </td>
                  <td>
                    <div>
                        <i class="fa fa-star grey cursor scale" v-show="ft.rating ==='undefined'" aria-hidden="true" title="Undefined"></i>
                        <i class="fa fa-star red cursor scale" v-show="ft.rating ==='unlikely'" aria-hidden="true" title="unlikely"></i>
                        <i class="fa fa-star blue cursor scale" v-show="ft.rating ==='fifty'" aria-hidden="true" title="Fifty Fifty"></i>
                        <i class="fa fa-star green cursor scale" v-show="ft.rating ==='likely'" aria-hidden="true" title="Likely"></i>
                    </div>
                  </td>
              </tr>
          </tbody>
          <tbody v-else>
            <tr >
              <td>
                <a data-toggle="modal" data-target="#predition" class="cursor">
                  Add  Prediction
                </a>
              </td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import {EventBus} from '../../event-bus';
export default {
  methods: {
    rate(id, name) {
      const that = this;
      axios.post('/api/event/event_prediction/rate',{
        id,
        name
      }).then((res) => {
        if(res.data.status) {
          const event = that.values.find((e) => e.id === id);
          event.rating = name;  
        } else {
          alert('An Error must have occurred try again');
        }
      }).catch((e) => {
        console.log(e);
      });
    }
  },
  mounted() {
    const that = this;
    this.values =  this.event_prediction
    EventBus.$on('getEventPredictions', function (event_id) {
      axios.get(`/api/event/event_prediction/get/${event_id}`)
      .then((res) => {
        that.values = res.data
      }).catch((e) => {
        console.log('=-=-', e);
      })
    });
  },
  props: ['event_prediction'],
  data() {
    return {
      values: []
    }
  },
  watch: {
    event_prediction(newVal, oldVal) {

    }
  },
}
</script>

