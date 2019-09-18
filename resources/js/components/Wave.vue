<template>
    <div class="container">
      <section>
        <div class="table-responsive">
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
        </div>
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
                      elements: {
                        point:{
                            radius: 0
                        }
                    },
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
                          },
                          // gridLines: {
                          //     zeroLineColor: 'red'
                          // }
                        }],
                        xAxes: [{
                          ticks: {
                              beginAtZero:true,
                              fontSize: 15
                          },                          
                        }]
                    },
                    maintainAspectRatio: false,
                    responsive: true,
                },
                multi_options: {
                      elements: {
                        point:{
                            radius: 0
                        }
                    },
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        yAxes: [
                          {
                            id: 'A',
                            // type: 'linear',
                            position: 'left',
                            ticks: {
                              min: 0
                            }
                          }, {
                            id: 'B',
                            // type: 'linear',
                            position: 'right',
                            ticks: {
                              min: 0
                            },
                            gridLines: {
                              display: false,
                            }
                          }, {
                            id: 'C',
                            type: 'linear',
                            position: 'left',
                            ticks: {
                              min: 0,
                              display:false,
                            },
                            gridLines: {
                              drawBorder: false,
                              display: false,
                            },
                          }, {
                            id: 'D',
                            type: 'linear',
                            position: 'left',
                            ticks: {
                              min: 0,
                              display:false,
                            },
                            gridLines: {
                              drawBorder: false,
                              display: false,
                            },
                          }  
                         
                        ],
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
                chart_data_multi_left: [],
                chart_data_multi_right: [],
                chart_labels_normal: [],
                // chart_labels_multi: [],
                base_url: '',
                uri: '',
                all_data: [],
            }
        },
        methods: {
            init: function() {
                this.loaded = true;
                let currentObject = this;                
                try {
                    this.axios.get(this.uri).then(res => {
                        if(Object.keys(res.data).length > 0){
                            console.log(res.data.data);
                            this.all_data = res.data.data;
                            for (let i = 0; i < this.all_data.length; i++) {

                              if(this.all_data[i].nameId == 'dir'){
                                this.chart_labels_normal.push(this.date_format(this.all_data[i].localDate));
                                this.chart_data_normal.push(this.all_data[i].value);                                
                              }
                              if(this.all_data[i].nameId == 'hm0'){
                                this.chart_data_multi_left.push(this.all_data[i].value);
                              }
                              if(this.all_data[i].nameId == 'tp'){
                                this.chart_data_multi_right.push(this.all_data[i].value);
                              }
                              
                            }

                            let max_data = [];
                            let min_data = [];
                            max_data = this.chart_data_multi_left.slice();
                            min_data = this.chart_data_multi_left.slice();
                            max_data.fill(Math.max.apply(null, this.chart_data_multi_left));
                            min_data.fill(Math.min.apply(null, this.chart_data_multi_left));

                            this.chartdata_normal = {
                              labels: this.chart_labels_normal,
                              datasets: [{
                                  backgroundColor: "red",
                                  label: 'dir',
                                  data: this.chart_data_normal,
                                  fill: false,
                                  borderWidth: 3,
                                  borderColor: 'rgba(255,99,132,1)',
                              }],
                            };
                            this.chartdata_multi = {
                              labels: this.chart_labels_normal,
                              
                              datasets: [{
                                label: 'hm0',
                                yAxisID: 'A',
                                data: this.chart_data_multi_left,
                                fill: false,
                                borderWidth: 3,
                                borderColor: '#247ade',
                              }, {
                                label: 'tp',
                                yAxisID: 'B',
                                data: this.chart_data_multi_right,
                                fill: false,
                                borderWidth: 3,
                                borderColor: '#dc5c0d',
                              }, {
                                label: 'max',
                                yAxisID: 'A',
                                data: max_data,
                                fill: false,
                                borderWidth: 1,
                                borderColor: '#dc5c0d',
                              }, {
                                label: 'min',
                                yAxisID: 'A',
                                data: min_data,
                                fill: false,
                                borderWidth: 1,
                                borderColor: '#41c53a',
                              }]
                              
                            };
                            this.loaded = true;
                        }
                    }).catch(function (error) {
                        if(error != ''){
                        }
                        
                    })
                    .finally(function () {
                        // always executed
                    });
                } catch (e) {
                console.error(e)
                }
            },
            date_format: function(value){
              if (!value) return '';
              let date = [];
              date = value.split(' ')[1];
              date = date.split(':');
              return date[0] + 'h';
            },
            // max_line: function(value){
            //   if(value.length == 0) return '';
            //   let max = Math.max.apply(null, value);
            //   let max_data = [];
            //   max_data.fill(max, 0, value.length);
            //   return 'max_data';
            // },
            // min_line: function(value){
            //   if(value.length == 0) return '';
            //   let min = Math.min.apply(null, value);
            //   let min_data = [];
            //   min_data.fill(min, 0, value.length);
            //   return min_data;
            // }
        },
        async mounted () {
            this.loaded = false;
            this.base_url = document.getElementById('base_url').value;
            this.uri = this.base_url + 'api/init_wave';
            this.init();
        },
        components: {
            lineChart: LineChart,
        }
    }
</script>
