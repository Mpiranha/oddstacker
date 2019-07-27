<template>
    <div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                <th></th>
                <th>Image</th>
                <th>Name</th>
                <th>Type</th>
                <th>Actions</th>
                </thead>
                <tbody v-if="teams.length > 0">

                <tr v-for="team in teams">
                    <td>
                        <div class="modal fade" :id="`team-leagues-${team.id}`" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title text-center" id="exampleModalCenterTitle">
                                            Add Leagues to {{team.name}}</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="card" style="height:fit-content">
                                        <div class="modal-body">
                                            <div class="content table-responsive table-full-width">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                    <th class="">League Name</th>
                                                    <th>Add</th>
                                                    </thead>
                                                    <tbody v-if="leagues.length > 0">
                                                    <tr v-for="ft in leagues">
                                                        <td class="">
                                                            {{ft.name}}
                                                        </td>
                                                        <td>
                                                            <label class="checkbox-container">
                                                                <input type="checkbox" :id="`check-${ft.id}`"
                                                                       @change="addLeague($event, ft.id, `check-${ft.id}`, team.id)"
                                                                       :checked="isChecked(ft.id, team.id)"
                                                                >
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </td>
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
                    </td>
                    <td>
                        <img :src="team.logo" height="35px"
                             :alt="team.name+' image'"/>
                    </td>
                    <td>
                        {{team.name}}
                    </td>
                    <td>
                        {{team.type}}
                    </td>
                    <td>
                        <a class="cursor" style="color: black" data-toggle="modal"
                           :data-target="`#team-leagues-${team.id}`">
                            <i class="fa fa-trophy"></i>
                        </a>
                        <a class="cursor" style="color: black" v-on:click="deleteTeam(team)">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>

                </tr>

                </tbody>
                <tbody v-else="">
                <tr>
                    <td colspan="100%" class="text-center">No team for this sport.</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import {EventBus} from '../../event-bus';
    export default {
        props: ['sport_id', 'leagues', 'teams'],
        data(){
            return {
                league_selected: {}
            }
        },
        created(){
            if (this.teams.length) {
                this.teams.forEach((team) => {
                    let item_name = `t${team.id}`
                    if (typeof this.league_selected[item_name] !== 'object') {
                        this.league_selected[item_name] = []
                    }

                    if (team.leagues.length) {
                        team.leagues.forEach((e) => {
                            this.league_selected[item_name].push(e.id);
                        })
                    }
                });

            }
        },
        watch: {
//            league_selected(newVal, oldVal) {
//
//            },
//            teams(newVal, oldVal) {
//                return newVal
//            }
        },
        computed: {

        },
        methods: {
            deleteTeam: function (team) {
                let result = confirm(`Are you sure you want to delete ${team.name}?`);
                if (result) {
                    console.log("BEFORE: ", this.teams)
                    let selected_team = this.teams.indexOf(team)
                    this.teams.splice(selected_team, 1)
                    axios.delete(`/api/team/delete/${team.id}`).then((resp) => {
                        if (resp.data.status) {
                            location.reload()
                        }
                    }).catch((e) => console.log(e))
                }
            },
            addLeague(event, id, e, team) {
                let check_id = document.querySelector(`#${e}`);
                let item_name = `t${team}`
                console.log(check_id)
                if (event.target.checked) {
                    if (this.league_selected[item_name].includes(id)) {
                        let index = this.league_selected[item_name].indexOf(id);
                        if (index > -1) {
                            this.league_selected[item_name].splice(index, 1);
                            this.deleteValue(id, team);
                        }
                        return
                    }
//                    console.log("IN HERE")
                    this.league_selected[item_name].push(id);
                    this.addValue(id, team);
                } else {
//                    console.log("NONONO")
                    let index = this.league_selected[item_name].indexOf(id);
//                    console.log("INDEX: ", index)
                    if (index > -1) {
                        this.league_selected[item_name].splice(index, 1);
                        this.deleteValue(id, team);
                    }
                }
            },
            addValue(id, team) {
                axios.post('/api/team/league/add-value', {
                    league_id: id,
                    team_id: team
                }).then((res) => {
                    if (res.data.status) {
                        EventBus.$emit('getTeamLeagues', team);
                    }
                }).catch((e) => {
                    console.log(e)
                })
            },
            deleteValue(id, team) {
                axios.post('/api/team/league/delete', {
                    league_id: id,
                    team_id: team
                }).then((res) => {
                    EventBus.$emit('getTeamLeagues', team);
                }).catch((e) => {
                    console.log(e);
                })
            },
            isChecked(id, team) {
                let item_name = `t${team}`

                if (this.league_selected[item_name].includes(id)) {
                    return 'checked';
                }
            }
        }
    }

</script>
<style scoped>
    /* The container */
    .checkbox-container {
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
    .checkbox-container input {
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
    .checkbox-container:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .checkbox-container input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .checkbox-container input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .checkbox-container .checkmark:after {
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
