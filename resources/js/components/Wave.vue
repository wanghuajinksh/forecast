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
              <apex-chart
                v-if="loaded"
                height=280
                type=line
                :options="normal_options"
                :series="chartdata_normal"
              ></apex-chart>
          </div>
          <div class="col-md-6">
                <apex-chart
                  v-if="loaded"
                  height=280
                  type=line
                  :options="multi_options"
                  :series="chartdata_multi"
                ></apex-chart>
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
import VueApexCharts from 'vue-apexcharts';
    export default {
        data() {
            return{
                loaded: false,
                normal_options: {},
                multi_options: {},
                chartdata_multi: [],
                chartdata_normal:[],
                chart_data_normal: [],
                chart_data_multi_left: [],
                chart_data_multi_right: [],
                chart_labels_normal: [],
                base_url: '',
                uri: '',
                all_data: [],
            }
        },
        methods: {
            init: function() {
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

                            this.normal_options = {
                              yaxis: {
                                show: true,
                                showAlways: true,
                                axisBorder: {
                                  show: true,
                                  color: '#78909C',
                                  offsetX: 0,
                                  offsetY: 0
                              },
                                axisTicks: {
                                  show: true,
                                  borderType: 'solid',
                                  color: '#78909C',
                                  width: 6,
                                  offsetX: 0,
                                  offsetY: 0
                              },
                              },
                              grid: {
                                show: true,
                                xaxis: {
                                    lines: {
                                        show: true
                                    }
                                },   
                                yaxis: {
                                    lines: {
                                        show: true
                                    }
                                },
                              },
                              chart: {
                                toolbar:{
                                  show:false,
                                }
                              },
                               animations: {
                                  enabled: true,
                                  easing: 'linear',
                                  dynamicAnimation: {
                                      speed: 1000
                                  }
                              },
                              colors: ["#e3342f"],
                              stroke: {
                                  show: true,
                                  curve: ['smooth'],
                                  lineCap: 'square',
                                  colors: ['#e3342f'],
                                  width: 4,
                                  dashArray: 0,      
                              },
                              xaxis: {
                                categories: this.chart_labels_normal,
                              }
                            }
                            this.chartdata_normal = [
                              {
                                name: 'dir',
                                data: this.chart_data_normal
                              }
                            ];

                            this.multi_options = {
                              annotations: {
                                yaxis: [
                                  {
                                    y: Math.min.apply(null, this.chart_data_multi_left),
                                    borderColor: "#00a96c",
                                    strokeDashArray: 0,
                                  },
                                  {
                                    y: Math.max.apply(null, this.chart_data_multi_left),
                                    borderColor: "#fb0707",
                                    strokeDashArray: 0,
                                  },
                                ], 
                              },
                              yaxis: [
                                {
                                  axisTicks: {
                                    show: true
                                  },
                                  axisBorder: {
                                    show: true,
                                    color: "#0269e0"
                                  },
                                  labels: {
                                    style: {
                                      color: "#000"
                                    }
                                  },
                                },
                                {
                                  opposite: true,
                                  axisTicks: {
                                    show: true
                                  },
                                  axisBorder: {
                                    show: true,
                                    color: "#f98d02"
                                  },
                                  labels: {
                                    style: {
                                      color: "#000"
                                    }
                                  },
                                }
                              ],
                              legend: {
                                show: false,
                              },
                              colors: ["#0269e0", "#f98d02"],
                              grid: {
                                show: true,
                                xaxis: {
                                    lines: {
                                        show: true
                                    }
                                },   
                                yaxis: {
                                    lines: {
                                        show: true
                                    }
                                },
                              },
                              chart: {
                                toolbar:{
                                  show:false,
                                }
                              },
                               animations: {
                                  enabled: true,
                                  easing: 'linear',
                                  dynamicAnimation: {
                                      speed: 1000
                                  }
                              },
                              stroke: {
                                  show: true,
                                  curve: ['smooth','smooth'],
                                  // lineCap: 'square',
                                  colors: ['#0269e0','#f98d02'],
                                  width: [4,4],
                                  // dashArray: 0,      
                              },
                              xaxis: {
                                categories: this.chart_labels_normal,
                              }
                            }
                            console.log(this.chart_data_multi_left);
                            this.chartdata_multi = [
                              {
                                name: "hm0",
                                data: this.chart_data_multi_left
                              },
                              {
                                name: "tp",
                                data: this.chart_data_multi_right
                              }
                            ];
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
            apexChart: VueApexCharts
        }
    }
</script>


