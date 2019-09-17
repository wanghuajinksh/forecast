<template>
    <div class="container">
      <section>
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            
            <tr>
              <td>08:00</td>
              <td>
                <div class="detail_data">
                  <div class="row">
                    <div class="col-4">
                      <i class="fa fa-arrow-circle-up arrow"></i>
                    </div>
                    <div class="col-8">
                      <div>298º</div>
                      <div style="margin-top: -5px;">w</div>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="detail_data">
                  <div class="row">
                    <div class="col-12" style="padding:0;margin-top:-5px;">
                      <span style="font-size:35px;">11.9</span>
                      <span style="vertical-align: top;">m</span>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="detail_data">
                  <div class="row">
                    <div class="col-12" style="padding:0;margin-top:-5px;">
                      <span style="font-size:35px;">12.1</span>
                      <span style="vertical-align: top;">s</span>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>11:00</td>
              <td>
                <div class="detail_data">
                  <div class="row">
                    <div class="col-4">
                      <i class="fa fa-arrow-circle-up arrow"></i>
                    </div>
                    <div class="col-8">
                      <div>298º</div>
                      <div style="margin-top: -5px;">w</div>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="detail_data">
                  <div class="row">
                    <div class="col-12" style="padding:0;margin-top:-5px;">
                      <span style="font-size:35px;">11.9</span>
                      <span style="vertical-align: top;">m</span>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="detail_data">
                  <div class="row">
                    <div class="col-12" style="padding:0;margin-top:-5px;">
                      <span style="font-size:35px;">12.1</span>
                      <span style="vertical-align: top;">s</span>
                    </div>
                  </div>
                </div>
              </td>
            </tr>            
          </tbody>
        </table>
      </section>
      <section>
        <div class="row">
          <div class="col-md-6">
            <div style="position:relative;">
                <line-chart
                    v-if="loaded"
                    :chart-data="chartdata_normal"
                    :options="normal_options" :height="280"/>
            </div>
          </div>
          <div class="col-md-6">
            <line-chart
                v-if="loaded"
                :chart-data="chartdata_multi"
                :options="multi_options" :height="280"/>
          </div>
        </div>
      </section>
      <section style="margin-top:60px;">
        <table class="table">
          <thead style="border-bottom: 2px solid #737373;">
            <th>Fecha</th>
            <th>DirTpº</th>
            <th>Hm</th>
            <th>Tp</th>
          </thead>
          <tbody>
            <tr>
              <td>27/08|17:00</td>
              <td>274</td>
              <td>1.81</td>
              <td>11.9</td>
            </tr>
          </tbody>
        </table>
      </section>
      <section class="text-center">
        <p>This is csv download</p>
        <div class="row">
          <div class="col-6"><input type="button" class="btn btn-primary float-right" value="button"></div>
          <div class="col-6"><input type="button" class="btn btn-primary float-left" value="button"></div>
        </div>
        <div class="clearfix"></div>
      </section>
    </div>
</template>

<script>
import LineChart from '../chart';
    export default {
        data() {
            return{
                loaded: false,
                normal_options: {
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            fontSize: 15,
                            // max: 50
                        }
                        }],
                        xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            fontSize: 15
                        }
                        }]
                    },
                    maintainAspectRatio: false,
                    responsive: true,
                },
                multi_options: {
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            fontSize: 15,
                            // max: 50
                        }
                        }],
                        xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            fontSize: 15
                        }
                        }]
                    },
                    maintainAspectRatio: false,
                    responsive: true,
                },
                chartdata_normal: null,
                chartdata_multi: null,
                chart_data_normal: [],
                chart_data_multi: [],
                chart_labels_normal: [],
                chart_labels_multi: [],
                base_url: '',
                uri: '',
            }
        },
        methods: {
            init: function() {
                this.loaded = true;
                let currentObject = this;
                this.uri = this.base_url + '';
                // try {
                //     this.axios.get(this.uri).then(response => {
                //         if(Object.keys(response.data).length > 0){
                //             this.tweet_counter = response.data.tweet_counter;
                //             this.today_count = response.data.today_count;
                //             this.user_count = response.data.user_count;
                //             this.first_date = response.data.key_array[0];
                //             this.last_date = response.data.key_array[6];
                //             this.chart_labels = response.data.key_array;
                //             this.chart_data = response.data.tweet_number;
                //             this.chartdata = {
                //                 labels: this.chart_labels,
                //                 datasets: [{
                //                     backgroundColor: "#50aa5b",
                //                     data: this.chart_data,
                //                     fill: true,
                //                     borderWidth: 1,
                //                     borderColor: 'rgba(255,99,132,1)',
                //                 }],
                //             }
                //             this.loaded = true;
                //             this.flag = true;
                //         }
                //     }).catch(function (error) {
                //         if(error != ''){
                //             currentObject.flag = true;
                //         }
                        
                //     })
                //     .finally(function () {
                //         // always executed
                //     });
                // } catch (e) {
                // console.error(e)
                // }
            }
        },
        async mounted () {
            this.loaded = false;
            this.base_url = document.getElementById('base_url').value;
            this.init();
        },
        components: {
            lineChart: LineChart,
        }
    }
</script>
