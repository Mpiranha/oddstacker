<template>
  <div>
    <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th class="">Name</th>
              <th class="">Alias</th>
              <th class="">Rating</th>
          </thead>
          <tbody v-if="this.event_prediction.length > 0">
              <tr v-for="(ft, i) in event_prediction" :key="i" :value="ft.id">
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
  props: ['event_prediction']
}
</script>

