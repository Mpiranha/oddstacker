<template>
  <div>
    <div class="header">
        <h4 class="text-center black">Events</h4>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
                <th class="text-center">Team A</th>
                <th class="text-center">Team B</th>
                <th class="text-center">Schedule</th>
                <th class="text-center">Action</th>
            </thead>
            <tbody v-if="this.events_length">
              <tr v-for="(event, i) in events_data" :key="i">
                  <td class="text-center">
                      <img :src="event.team_a.logo" height="30px" :alt="`${event.team_a.name} image`" />
                      {{ event.team_a.name }}
                  </td>
                  <td class="text-center">
                      <img :src="event.team_b.logo" height="30px" :alt="`${event.team_b.name} image`" />
                      {{ event.team_b.name }}
                  </td>
                  <td class="text-center">{{ event_time(event.event_schedule) }}</td>
                  <td class="text-center">
                      <a class="btn btn-sm btn-primary btn-fill" @click="viewEventPage(event.id)">view</a>
                      <a class="btn btn-sm btn-danger btn-fill" @click="deleteEvent(event.id)" >delete</a>
                  </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr >
                  <td colspan="100%" class="text-center">NO Event</td>
              </tr>
            </tbody>
        </table>
    </div>
  </div>
</template>

<script>
import moment from 'moment'
export default {
  props: ['events'],
  methods: {
      event_time(date) {
        if (date) {
          return moment(date).format('LLLL')
        }
        return null;
      },
      deleteEvent(id) {
        const confm = confirm('Are you sure you want to delete this event');
        if(confm) {
          console.log(id);
          // return;
          axios.delete(`/api/event/delete/${id}`)
          .then((res) => {
            if (res.data.status) {
              location.reload();
              return;
            }
            alert(res.data.message);
          })
          .catch((e) => {
          })
        }

      },
      viewEventPage(id) {
        location.href = `/admin/events/eventPage/${id}`
      }
    },
  computed: {
    events_length() {
      return this.events.data.length > 0;
    },
    events_data() {
      return this.events.data;
    }
  },
}
</script>
