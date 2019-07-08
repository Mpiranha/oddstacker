<template>
    <div>
        <h4 class="text-center">Select Category</h4>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center" v-for="(sc, i) in stockcategories" :key="i"
           t            @click="setCategory(sc.name, sc.id)"
                        :class="catClick">
                  <span class="cursor">
                    {{sc.name}}
                  </span>
                    </td>
                </tr>
                </tbody>
            </table>
            <hr>
            <div v-if="category.name">
                <h3 class="text-center">{{category.name}}</h3>
                <div>
                    <h6 class="text-center">Select Type</h6>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped" style="margin-bottom: 0px">
                            <thead>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center" v-for="(sc, i) in types" :key="i"
                                    @click="setType(sc.name, sc.id)">
                      <span class="cursor">
                        {{sc.name}}
                      </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div v-if="this.type.name">
                        <div class="od-flow">
                            <h4 class="" style="margin:0px">{{type.name}}</h4>
                            <a class="btn btn-sm btn-primary" @click="view">view</a>
                        </div>
                        <div v-if="this.event_view">
                            <h5 class="text-center">
                                {{this.type.name}}
                            </h5>
                            <!-- <div class="flex justify-con-center" v-if="loader" >
                              <div class="loader"></div>
                            </div> -->
                            <div v-if="this.type.name === 'event'">
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped" style="margin-bottom: 0px">
                                        <thead>
                                        <th class="text-center">sports</th>
                                        <th class="text-center">Leagues</th>
                                        <th class="text-center">Event</th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-control form-control-sm" v-model="sport">
                                                    <option v-for="(ft, i) in sports" :key="i" :value="ft.id">{{ft.name}}</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <div style="display: flex; align-items: center;" v-if="leagues">
                                                    <select class="form-control form-control-sm" v-model="league">
                                                        <option v-for="(ft, i) in leagues" :key="i" :value="ft.id">
                                                            {{ft.name}}
                                                        </option>
                                                    </select>
                                                    <a class="btn btn-sm btn-primary" @click="getEvent">get</a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div style="display: flex; align-items: center;" v-if="this.events">
                                                    <select class="form-control form-control-sm" v-model="event">
                                                        <option v-for="(ft, i) in events" :key="i" :value="ft.id">
                                                            {{ft.team_a.name}} - {{ft.team_b.name}}
                                                        </option>
                                                    </select>
                                                    <!-- <a class="btn btn-sm btn-primary" @click="getEvent">get</a> -->
                                                </div>
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
        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            this.sport = this.sports[0].id
        },
        props: ['stockcategories', 'types', 'sports', 'countries'],
        data() {
            return {
                category: {
                    name: null,
                    id: null,
                },
                type: {
                    name: null,
                    id: null,
                },
                event_view: null,
                loader: false,
                sport: null,
                leagues: null,
                league: null,
                events: null,
                event: null,
                games: []
            }
        },
        methods: {
            getEvent() {
                this.events = null;
                const sport_id = this.sport;
                const league_id = this.league;
                const that = this
                axios.get(`/api/stock/events/${league_id}`)
                    .then((res) => {
                        if (res.data.length) {
                            that.events = res.data;
                            that.event = res.data[0].id;
                        } else {
                            that.events = res.data;
                            that.event = null;
                        }
                    }).catch((e) => {
                    alert('an error must have occured try again');
                })
            },
            getLeague() {
                this.leagues = null;
                const sport_id = this.sport;
                const that = this
                axios.get(`/api/stock/leagues/${sport_id}`)
                    .then((res) => {
                        that.leagues = res.data;
                        that.league = res.data[0].id;
                    }).catch((e) => {
                    alert('an error must have occured try again');
                })
            },
            view() {
                this.event_view = true;
                this.loader = true;
                let that = this;
                this.getLeague()
                setTimeout(() => {
                    that.loader = false
                }, 5000);
            },
            setCategory(name, id) {
                this.category.name = name;
                this.category.id = id;
                this.event_view = null
            },
            setType(name, id) {
                this.type.name = name;
                this.type.id = id;
                this.event_view = null
            }
        },
        computed: {
            catClick() {
                if (this.category.name === 'premium') {
                    return 'premium'
                } else if (this.category.name === 'h-2-h') {
                    return 'h-2-h'
                } else if (this.category.name === 'double') {
                    return 'double'
                }
            },
        },

    }
</script>


<style scoped>
    .premium {
        background: #FFC000;
    }

    .h-2-h {
        background: #0070C0;
    }

    .double {
        background: #C00000;
        color: #fff;
    }

    .loader {
        border: 5px solid #f3f3f3;
        border-radius: 50%;
        border-top: 5px solid #3498db;
        width: 40px;
        height: 40px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
