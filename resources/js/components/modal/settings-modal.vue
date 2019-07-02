<template>
  <div>
      <div class="modal fade" id="setting" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Settings</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th class="text-center">Leagues</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <select v-model="league" class="form-control form-control-sm">
                                  <option v-for="(ft, i) in leagues" :key="i" :value="ft.id">{{ft.name}}</option>
                                </select>
                            </td>
                            <td class="text-center">
                              <button class="btn btn-sm btn-primary" @click="setTeam">Add teams</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>

<script>

import {EventBus} from '../event-bus';
export default {
  props: ['leagues'],
  mounted() {
    this.league = this.leagues[0].id;
  },
  methods: {
    setTeam() {
      const data = {
        league_id: this.league
      }
      EventBus.$emit('changeSettings', data);
    }
  },
  data() {
    return {
      league: null,
    }
  },
}
</script>

