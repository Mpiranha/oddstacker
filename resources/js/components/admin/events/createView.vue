<template>
    <div class="">
        <div class="header">
            <h4 class="text-center black">{{league.name}}</h4>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                <th class="text-center">Team A</th>
                <th class="text-center">Team B</th>
                <th class="text-center">Event Schedule</th>
                <th class="text-center">Event Ending</th>
                <th class="text-center">Action</th>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">{{teamA_name}} </td>
                    <td class="text-center">{{teamB_name}}</td>
                    <td class="text-center">{{format_time}}</td>
                    <td class="text-center">{{format_ending}}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary"
                                v-show="teamA && teamB && event_time && end_time" @click="createEvent">create
                        </button>
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
                <th class="text-center">Ending Time</th>
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
                    <td class="text-center">
                        <datetime type="datetime" v-model="end_time" id="end_time"></datetime>
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
            this.league_id = this.league.id;
            this.getTeams();
        },
        props: ['league', 'sport'],
        data() {
            return {
                league_id: null,
                teamA: null,
                teamB: null,
                event_time: null,
                end_time: null,
                teams: null,
            }
        },
        methods: {
            createEvent() {
                if (this.teamA === this.teamB) {
                    alert('Team A and Team B cannot be the same team');
                    return;
                }
                let that = this;
                let time = new Date(this.event_time);
                let time2 = new Date(this.end_time);
                const data = {
                    teamA_id: this.teamA,
                    teamB_id: this.teamB,
                    league_id: this.league.id,
                    event_schedule: time,
                    event_ending: time2,
                    sport_id: this.sport
                }
                axios.post('/api/event/create',
                    data,
                ).then((res) => {
                    alert('created Successfully');
                    that.teamA = null;
                    that.teamB = null;
                    that.event_time = null;
                    that.end_time = null;
                    location.reload();
                }).catch((e) => {
                    console.log(e);
                });
            },
            getTeams() {
                this.teamA = null;
                this.teamB = null;
                const league_id = this.league_id;
                const that = this;
                axios.get(`/api/teams/${league_id}`)
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
                return this.event_time?moment(this.event_time).format('LLLL'): 'No time set' // any message can be displayed here
            },
            format_ending() {
                return this.end_time?moment(this.end_time).format('LLLL'): 'No time set' // any message can be displayed here
            },
            teamA_name() {
                if (this.teamA) {
                    const d = this.teams.find((team) => team.id === this.teamA);
                    return d.name;
                }
                return null;
            },
            teamB_name(){
                if (this.teamB) {
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
            teams(newVal, oldVal) {

            }
        },
    }
</script>
