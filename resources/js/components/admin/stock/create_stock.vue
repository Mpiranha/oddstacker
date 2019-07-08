<template>
    <div>
        <div class="clearfix">
            <div class="col-md-12">
                <h4>Select Stock Type</h4>
                <a class="btn btn-primary btn-fill" v-for="(sc, i) in stockcategories" :key="i"
                   @click="setCategory(sc.name, sc.id, sc.boxes)"
                   :class="catSelected">
                  <span class="cursor">
                    {{sc.name}}
                  </span>
                </a>&nbsp;
            </div>
        </div>
        <div v-if="category.name">
            <div class="text-center">
                <h3>{{ category.name }}</h3>
            </div>
            <br>

            <div class="clearfix" v-if="category.name">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select Sport</label>
                        <select class="form-control" v-model="sport_id" v-on:change="getEvents">
                            <option v-for="sport in sports" :value="sport.id">{{ sport.name }}</option>
                        </select>
                    </div>
                </div>

                <div class="" v-if="loaders.events_section || events.length < 1"></div>
                <div class="clearfix" v-else>
                    <div class="clearfix col-md-12">
                        <button type="button" class="btn btn-primary btn-sm btn-fill pull-right" v-on:click="addEvent"
                                v-if="category.boxes > stock_events.length">
                            Add Event
                        </button>
                    </div>
                    <div class="clearfix col-md-12" v-if="stock_events.length">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Event</th>
                                <th>Prediction</th>
                                <th>Remove</th>
                                </thead>
                                <tbody>
                                <tr v-for="(match, index) in stock_events">
                                    <td>{{ match.event_name }}</td>
                                    <td>{{ match.prediction_name }}</td>
                                    <td><a style="color: black" v-on:click="removeEvent(index)">
                                        <i class="fa fa-trash cursor"></i>
                                    </a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="clearfix col-md-12" v-if="stock_events.length == category.boxes">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Stock Type" v-model="stock_type">
                            </div>

                            <div class="clearfix">
                                <div class="col-md-12">
                                    <h3>Stack, Entry & Value Margin</h3>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Entry</label>
                                            <input type="tel" class="form-control" placeholder="Entry"
                                                   v-model="stock_entry">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Stake</label>
                                            <money v-bind="money" class="form-control" placeholder="Stack"
                                                   v-model="stack"></money>
                                        </div>
                                    </div>


                                    <div v-show="stackValue">
                                        <h5>STOCK VALUE: {{ stackValue | currency }}</h5>

                                        <div class="form-group">
                                            <div class="col-md-5">
                                                <label>Value - Commission</label>
                                                <money v-bind="money" class="form-control" :value="valueWithCommission"
                                                       readonly></money>
                                            </div>
                                            <div class="col-md-3">
                                                <label>%</label>
                                                <input type="tel" class="form-control" v-model="commission_percent"
                                                       v-on:input="updateCommission($event, 'percent')"
                                                       placeholder="Commission in percent">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Commission in amount</label>
                                                <input type="tel" class="form-control" v-model="commission_amount"
                                                       v-on:input="updateCommission($event, 'amount')"
                                                       placeholder="Commission in amount">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="clearfix col-md-12">
                                            <br>
                                            <span class="cursor pull-right" v-on:click="addWinnersMargin">
                                               <i class="fa fa-plus"></i> Wining Margin
                                            </span>
                                            <br><br>
                                        </div>

                                        <div class="" v-if="winners.length > 0">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label>Select All</label> <input type="checkbox" @change="selectAll" v-model="allSelected">
                                                </div>
                                                <div class="col-md-5" v-if="multiple_winners.length > 0">
                                                    <label>Gain in amount</label>
                                                    <input type="tel" class="form-control" placeholder="amount" v-model="gain_amount"
                                                           v-on:input="updateMultiple($event, 'amount')">
                                                </div>
                                                <div class="col-md-4" v-if="multiple_winners.length > 0">
                                                    <label>Gain in %</label>
                                                    <input type="tel" class="form-control" placeholder="%" v-model="gain_percent"
                                                           v-on:input="updateMultiple($event, 'percent')">
                                                </div>
                                            </div>

                                            <div class="content table-responsive table-full-width">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                    <th>Select</th>
                                                    <th>Position</th>
                                                    <th>Amount</th>
                                                    <th>Percent</th>
                                                    <th>Remove</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(position, index) in winners">
                                                        <td><input type="checkbox" v-model="multiple_winners"
                                                                   :value="index" @click="select"></td>
                                                        <td>{{ index + 1 }}</td>
                                                        <td><input type="tel" :value="position.amount"
                                                                   v-on:input="alterMarginAmount($event, index, 'amount')"
                                                                   class="form-control"></td>
                                                        <td><input type="tel" :value="position.percent"
                                                                   v-on:input="alterMarginAmount($event, index, 'percent')"
                                                                   class="form-control"></td>
                                                        <td><a style="color: black" v-on:click="removePosition(index)">
                                                            <i class="fa fa-trash cursor"></i>
                                                        </a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="form-group">
                                                <label>Duplicate</label><input type="checkbox" v-model="duplicate">
                                            </div>
                                            <div class="form-group">
                                                <label>Available for promo users</label><input type="checkbox" v-model="available_for_promo">
                                            </div>
                                            <div class="form-group" v-if="schedule">
                                                <label>Set Schedule time</label>
                                                <datetime type="datetime" ref="schedule_time" input-class="form-control" v-model="schedule_time"></datetime>
                                            </div>

                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary btn-fill btn-sm" @click="saveStock">Save</button>
                                                <button type="button" class="btn btn-info btn-fill btn-sm" @click="scheduleStock">Schedule</button>
                                                <button type="button" class="btn btn-success btn-fill btn-sm" @click="publishStock">Publish</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <br>

        <div class="modal fade" id="addEventDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Select Event</label>
                            <select class="form-control" v-on:change="selectEvent" v-model="event">
                                <option value="" selected></option>
                                <option v-for="(event, index) in events" :value="index">{{ event.team_a.name
                                    }} vs {{ event.team_b.name }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Predictions</label>
                            <select class="form-control" v-model="prediction_index">
                                <option v-if="!selected_event"></option>
                                <option v-else v-for="(prediction, index) in selected_event.predictions" :value="index">
                                    {{ prediction.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm btn-fill" v-on:click="saveEvent"
                                :disabled="addEventStat">Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {Money} from 'v-money'
    export default {
        props: ['stockcategories', 'types', 'sports'],
        components: {Money},
        data(){
            return {
                money: {
                    decimal: '.',
                    thousands: ',',
                    prefix: '',
                    suffix: '',
                    precision: 2,
                    masked: false
                },
                category: {
                    name: null,
                    id: null,
                    boxes: null
                },
                loaders: {
                    events_section: true
                },
                event: '',
                events: [],
                stock_events: [],
                sport_id: null,
                selected_event: {},
                prediction_index: null,
                stock_type: '',
                stock_group: null,
                stock_entry: 0,
                stack: 0,
                commission_percent: 0,
                commission_amount: 0,
                winners: [],
                multiple_winners: [],
                gain_percent: 0,
                gain_amount: 0,
                allSelected: false,
                duplicate: false,
                available_for_promo: false,
                schedule_time: null,
                schedule: false
            }
        },
        mounted() {

        },
        computed: {
            catSelected() {
                if (this.category.name === 'premium') {
                    return 'premium'
                } else if (this.category.name === 'h-2-h') {
                    return 'h-2-h'
                } else if (this.category.name === 'double') {
                    return 'double'
                }
            },
            addEventStat(){
                if((this.prediction_index != null && _.size(this.selected_event)) && this.prediction_index > -1 && this.selected_event && (this.category.boxes > this.stock_events.length)){
                    return false
                }else {
                    return true
                }

            },
            stackValue(){
                if (this.stock_entry > 0 && this.stack > 0) {
                    return this.stock_entry * this.stack
                }
            },
            valueWithCommission(){
                return this.stackValue - this.commission_amount
            }
        },
        methods: {
            saveStock: function(){
                axios.post('/api/stock/save', {
                    category: this.category.id,
                    amount: this.stackValue,
                    value: this.valueWithCommission,
                    commission: this.commission_amount,
                    stake: this.stack,
                    entry: this.stock_entry,
                    duplicate: this.duplicate,
                    no_winners: this.winners.length,
                    sport_id: this.sport_id,
                    matches: this.stock_events,
                    stock_type: this.stock_type,
                    stock_group: this.stock_group,
                    price: this.winners,
                    available_for_promo: this.available_for_promo
                }).then((resp) => {
                    window.location = '/admin/stocks'
                }).catch((err) => console.log(err))
            },
            scheduleStock: function(){
                if(this.schedule_time == null){
                    this.schedule = true
                    this.$refs.schedule_time.$el.focus()
                    return;
                }

                this.publishStock()
            },
            publishStock: function(){
                axios.post('/api/stock/publish', {
                    category: this.category.id,
                    amount: this.stackValue,
                    value: this.valueWithCommission,
                    commission: this.commission_amount,
                    stake: this.stack,
                    entry: this.stock_entry,
                    duplicate: this.duplicate,
                    no_winners: this.winners.length,
                    sport_id: this.sport_id,
                    matches: this.stock_events,
                    stock_type: this.stock_type,
                    stock_group: this.stock_group,
                    price: this.winners,
                    available_for_promo: this.available_for_promo,
                    schedule_time: this.schedule_time
                }).then((resp) => {
                    window.location = '/admin/stocks'
                }).catch((err) => console.log(err))
            },
            selectAll: function(){
                this.multiple_winners = []

                if (this.allSelected) {
                    this.winners.forEach((val, ind) => {
                        this.multiple_winners.push(ind)
                    });
                }
            },
            select: function() {
                this.allSelected = false;
            },
            updateMultiple: function (event, trigger) {
                if (this.multiple_winners.length > 0) {
                    if (event.target.value > 0) {
                        if (trigger === 'percent') {
                            this.gain_amount = (this.valueWithCommission * event.target.value) / 100
                        } else {
                            this.gain_percent = (this.gain_amount * 100) / this.valueWithCommission
                        }
                    }

                    this.multiple_winners.forEach((val) => {
                        this.winners[val].percent = this.gain_percent
                        this.winners[val].amount = this.gain_amount
                    })
                }
            },
            alterMarginAmount: function (event, key, trigger) {
                if (event.target.value > 0) {
                    if (trigger === 'percent') {
                        this.winners[key].percent = event.target.value
                        this.winners[key].amount = (this.valueWithCommission * event.target.value) / 100
                    } else {
                        this.winners[key].amount = event.target.value
                        this.winners[key].percent = (event.target.value * 100) / this.valueWithCommission
                    }
                }
            },
            removePosition: function (key) {
                this.winners.splice(key, 1)
            },
            addWinnersMargin: function () {
                this.winners.push({
                    amount: 0,
                    percent: 0
                })
            },
            identicalArr(arr, key){
                for (let i = 0; i < arr.length - 1; i++) {
                    if (arr[i][key] !== arr[i + 1][key]) {
                        return false;
                    }
                }
                return true;
            },
            updateCommission: function (event, trigger) {
                if (event.target.value > 0) {
                    if (trigger === 'percent') {
                        this.commission_amount = (this.stackValue * event.target.value) / 100
                    } else {
                        this.commission_percent = (this.commission_amount * 100) / this.stackValue
                    }
                }
            },
            setCategory(name, id, boxes) {
                this.category.name = name;
                this.category.id = id;
                this.category.boxes = boxes

                this.clearAllRecord()
                this.sport_id = null
            },
            clearAllRecord: function () {
                this.events = []
                this.stock_events = []

                this.selected_event = {}
                this.prediction_index = null
                this.event = ''
            },
            addEvent: function () {
                //before showing the add event modal we check if the events added is enough
                if (this.category.boxes > this.stock_events.length) {
                    $('#addEventDialog').modal('show');
                }
            },
            removeEvent: function (key) {
                this.stock_events.splice(key, 1)
            },
            saveEvent: function () {
                if (this.addEventStat == false && this.stock_events.length < this.category.boxes) {
                    let data = {
                        event_id: this.selected_event.id,
                        event_name: `${this.selected_event.team_a.name} vs ${this.selected_event.team_b.name}`,
                        event_schedule: this.selected_event.event_schedule,
                        prediction_name: this.selected_event.predictions[this.prediction_index].name,
                        league_name: this.selected_event.league.name,
                        prediction_id: this.selected_event.predictions[this.prediction_index].id,
                        prediction_group: this.selected_event.predictions[this.prediction_index].group_id,
                        prediction_group_name: this.selected_event.predictions[this.prediction_index].group.name
                    }
                    this.stock_events.push(data)

                    if (this.stock_events.length == this.category.boxes) {
                        if (this.identicalArr(this.stock_events, 'event_name')) {
                            this.stock_type = this.stock_events[0].event_name
                            this.stock_group = 'matches'
                        } else if (this.identicalArr(this.stock_events, 'prediction_group_name')) {
                            this.stock_type = this.stock_events[0].prediction_group_name
                            this.stock_group = 'predictions'
                        } else if (this.identicalArr(this.stock_events, 'league_name')) {
                            this.stock_type = this.stock_events[0].league_name
                            this.stock_group = 'leagues'
                        } else {
                            this.stock_type = `${this.stock_events[0].league_name}, ${this.stock_events[1].league_name}, ${this.stock_events[2].league_name}`
                            this.stock_group = 'leagues'
                        }
                    }

                    this.selected_event = {}
                    this.prediction_index = null
                    this.event = ''

                    $('#addEventDialog').modal('hide');
                } else {
                    $('#addEventDialog').modal('hide');
                }
            },
            selectEvent: function (event) {
                this.selected_event = {}
                this.prediction_index = null
                if (event.target.value >= 0) {
                    this.selected_event = this.events[event.target.value]
//                    console.log(this.selected_event)
                }
            },
            getEvents: function () {
                this.clearAllRecord()
                this.loaders.events_section = true

                axios.get(`/api/stock/events/${this.sport_id}`)
                    .then((resp) => {
                        this.loaders.events_section = false
                        this.events = resp.data
                    })
                    .catch((err) => console.log(err))
            }
        }
    }

</script>
<style scoped>
    .premium {
        background: #FFC000;
    }

    .h-2-h {
        background: #0070C0;
        color: #fff;
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
