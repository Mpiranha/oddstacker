<template>
  <div>
    <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th class="">Name</th>
              <th class="">Alias</th>
              <th class="">Rating</th>
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
  mounted() {
    const that = this;
    console.log('evevev', this.event_prediction);
    this.values =  this.event_prediction
    EventBus.$on('getEventPredictions', function (event_id) {
      console.log('event_id-----',event_id);
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

