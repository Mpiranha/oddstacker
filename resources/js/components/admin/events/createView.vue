<template>
    <div class="">
        <div class="header">
            <h4 class="text-center black">{{competition.name}}</h4>
        </div>
         <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th class="text-center">Team A</th>
                    <th class="text-center">Team B</th>
                    <th class="text-center">Event Schedule</th>
                    <th class="text-center">Action</th>
                    <th class="text-center">Settings</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">{{teamA_name}} </td>
                        <td class="text-center">{{teamB_name}}</td>
                        <td class="text-center">{{format_time}}</td>
                        <td class="text-center" >
                            <button class="btn btn-sm btn-primary" 
                            v-show="this.teamA && this.teamB && this.event_time" @click="createEvent">create</button>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-primary" 
                            data-toggle="modal" data-target="#setting">settings</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="header">
            <p class="text-center black">Create</p>
        </div>
         <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th class="text-center">Team A</th>
                    <th class="text-center">Team B</th>
                    <th class="text-center">Schedule</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                            <select v-model="teamA" v-show="teams">
                                  <option v-for="(ft, i) in teams" :key="i" :value="ft.id">{{ft.name}}</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select v-model="teamB" v-show="teams">
                                  <option v-for="(ft, i) in teams" :key="i" :value="ft.id">{{ft.name}}</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <datetime type="datetime" v-model="event_time" id="event_time"></datetime>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
import moment from 'moment'
import {EventBus} from '../../event-bus';
export default {
    mounted() {
        const that = this;
        EventBus.$on('changeSettings', function (data) {
            that.league_id = data.league_id;
            that.country_id = data.country_id
            that.getTeams();
        });
    },
    props: ['competition'],
    data() {
        return {
            country_id: null,
            league_id: null,
            teamA: null,
            teamB: null,
            event_time: null,
            teams: null,
        }
    },
    methods: {
        createEvent() {
            if (this.teamA === this.teamB) {
                alert('Team A and Team B cannot be the same team');
                return;
            }
            let time = new Date(this.event_time);
            // time = time.getTime();
            const data = {
                teamA_id: this.teamA,
                teamB_id: this.teamB,
                competition_id: this.competition.id,
                event_schedule: time,
            }
            console.log('===>>',data);
            axios.post('/api/event/create',
                data,
            ).then((res) => {
                console.log('===>', res.data);
            }).catch((e) => {
                console.log(e);
            });
        },
        getTeams() {
            this.teamA = null;
            this.teamB = null;
            const league_id = this.league_id;
            const country_id = this.country_id;
            const that = this;
            axios.get(`/api/teams/${country_id}/${league_id}`)
            .then((res) => {
                that.teams = res.data.teams;
            })
            .catch((e) => {
                console.log(e);
            });
        }
    },
    computed: {
        format_time() {
            return moment(this.event_time).format('LLLL')
        },
        teamA_name() {
            if (this.teamA) {
                const d = this.teams.find((team) => team.id === this.teamA);
                return d.name;
            }
            return null;
        },
        teamB_name(){
            if(this.teamB) {
                const d = this.teams.find((team) => team.id === this.teamB);
                return d.name;
            }
            return null;
        }
    },
    watch: {
        league_id(newVal, oldVal) {
            this.league_id = newVal
        },
        country_id(newVal, oldVal) {
            this.country_id = newVal
        },
        teams(newVal, oldVal) {

        }
    },
}
</script>

<style>
#event_time {

}
    
</style>

