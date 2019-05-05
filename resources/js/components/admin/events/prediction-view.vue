<template>
  <div>
      <div class="modal fade" id="predition" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title text-center" id="exampleModalCenterTitle">Predictions</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="card" style="height:fit-content">
              <div class="modal-body">
                <div class="content table-responsive table-full-width">
                  <table class="table table-hover table-striped">
                      <thead>
                          <th class="">Name</th>
                          <th class="">Alias</th>
                          <th class="text-center">Add</th>
                          <!-- <th class="">has</th> -->
                      </thead>
                      <tbody v-if="this.predictions.length > 0">
                          <tr v-for="(ft, i) in predictions" :key="i" :value="ft.id">
                              <td class="">
                                {{ft.name}}
                              </td>
                              <td class="">
                                {{ft.alias}}
                              </td>
                              <td>
                                <label class="container" >
                                  <input type="checkbox" :id="`check-${ft.id}`"
                                   @click="addPrediction(ft.id, `check-${ft.id}`)" 
                                   :checked="isChecked(ft.id)"
                                   >
                                  <span class="checkmark"></span>
                                </label>
                              </td>
                              <!-- <td></td> -->
                          </tr>
                      </tbody>
                      <tbody v-else>
                        <tr>
                          No Predictions
                        </tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>

<script>

// import {EventBus} from '../event-bus';
export default {
  props: ['predictions', 'event_id', 'event_prediction'],
  mounted() {
    if (this.event_prediction.length) {
      this.event_prediction.forEach((e) => {
        this.predicted.push(e.prediction_id);
      })
    }
  },
  data() {
    return {
      predicted: [],
    }
  },
  methods: {
    isChecked(id) {
      if(this.predicted.includes(id)) {
        return 'checked';
      }
    },
    addPrediction(id, e) {
      let check_id = document.querySelector(`#${e}`);
      if(check_id.checked) {
        if(this.predicted.includes(id)) {
          return
        }
        this.predicted.push(id);
        this.addValue(id);
      }else {
        let index = this.predicted.indexOf(id);
        if (index > -1) {
          this.predicted.splice(index, 1);
          this.deleteValue(id);
        }
      }
    },
    addValue(id) {
      axios.post('/api/event/prediction/add-value', {
        prediction_id: id,
        event_id: this.event_id
      }).
      then((res) => {
        console.log('==-===', res)

      }).catch((e) => {
        console.log(e)
      })
    },
    deleteValue(id) {
      axios.post('/api/event/prediction/delete', {
        prediction_id: id,
        event_id: this.event_id
      }).then((res) => {
        console.log(res);
      }).catch((e) => {
        console.log(e);
      })
    },
    hasValue(id) {
      if(this.predicted.includes(id)) {
        return true;
      }
      return false;
    }
  },
  watch: {
    predicted(newVal, oldVal) {

    }
  },

}
</script>

<style scoped>
/* The container */
.container {
  display: block;
  position: relative;
  /* padding-left: 35px; */
  margin-bottom: 12px;
  cursor: pointer;
  /* font-size: 22px; */
  width: fit-content;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

</style>
