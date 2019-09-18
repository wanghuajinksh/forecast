<template>
    <div class="container custom_container">
      <section>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th>Firstname</th>
                <th>Lastname</th>
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
                        <span style="vertical-align: top;">kn</span>
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
          <div class="col-12">
            <div>
                <apex-chart
                  v-if="loaded"
                  height=280
                  type=line
                  :options="options"
                  :series="chartdata"
                ></apex-chart>
            </div>
            <div class="">
                <table class="table tbl_windir">
                   <tr>
                     <td class="td_first"></td>
                     <td><i class="fa fa-arrow-up arrow"></i></td>
                     <td><i class="fa fa-arrow-up arrow"></i></td>
                     <td><i class="fa fa-arrow-up arrow"></i></td>
                     <td><i class="fa fa-arrow-up arrow"></i></td>
                     <td><i class="fa fa-arrow-up arrow"></i></td>
                     <td><i class="fa fa-arrow-up arrow"></i></td>
                     <td><i class="fa fa-arrow-up arrow"></i></td>
                     <td><i class="fa fa-arrow-up arrow"></i></td>
                     <td><i class="fa fa-arrow-up arrow"></i></td>
                     <td><i class="fa fa-arrow-up arrow"></i></td>
                   </tr>
                </table>
                <table class="table tbl_timeinterval">
                   <tr>
                     <td class="td_first" ><span class="sp_firstmargin">18h</span></td>
                     <td><span class="sp_margin">21h</span></td>
                     <td><span class="sp_margin">00h</span></td>
                     <td><span class="sp_margin">03h</span></td>
                     <td><span class="sp_margin">06h</span></td>
                     <td><span class="sp_margin">09h</span></td>
                     <td><span class="sp_margin">12h</span></td>
                     <td><span class="sp_margin">15h</span></td>
                     <td><span class="sp_margin">18h</span></td>
                     <td><span class="sp_margin">21h</span></td>
                     <td><span class="sp_margin">00h</span></td>
                   </tr>
                </table>
            </div>
          </div>
        </div>
      </section>
      <section style="margin-top:60px;">
        <table class="table tbl_detail">
          <thead style="border-bottom: 2px solid #737373;">
            <th>Fecha</th>
            <th>Dir.</th>
            <th>Vel.<sup>kn</sup></th>
          </thead>
          <tbody>
            <tr>
              <td>27/08|17:00</td>
              <td><i class="fa fa-arrow-up arrow"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SSW</td>
              <td>1.81</td>
            </tr>
          </tbody>
        </table>
      </section>
      <section class="text-center">
        <p>Descargar Pronostico Viento</p>
        <div class="row">
          <div class="col-6"><button type="button" class="btn btn-info btn_excel float-right"><span>Excel</span>&nbsp;<i class="fa fa-download"></i></button></div>
          <div class="col-6"><button type="button" class="btn btn-info btn_excel float-left"><span>CSV</span>&nbsp;<i class="fa fa-download"></i></button></div>
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
                all_data: [],
                options: {},
                chartdata: [],
                chart_data: [],
                chart_labels: [],
                wind_dir: [],
                base_url: '',
                uri: '',
            }
        },
        methods: {
            init: function() {
                try{
                    this.axios.get(this.uri).then(res => {
                        if(Object.keys(res.data).length > 0){
                          console.log(res.data.data);
                          this.all_data = res.data.data;
                          for (let i = 0; i < this.all_data.length; i++) {
                            if(this.all_data[i].nameId == 'windmag'){
                              this.chart_labels.push(this.date_format(this.all_data[i].localDate));
                              this.chart_data.push(this.all_data[i].value);                                
                            }
                            if(this.all_data[i].nameId == 'winddir'){
                              this.wind_dir.push(this.all_data[i].value);
                            }
                          }

                          this.options = {
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
                            colors: ["#96b200"],
                            stroke: {
                                show: true,
                                curve: ['smooth'],
                                lineCap: 'square',
                                colors: ['#96b200'],
                                width: 4,
                                dashArray: 0,      
                            },
                            xaxis: {
                              categories: this.chart_labels,
                              labels: {
                                show: false,
                              },
                              axisTicks: {
                                show: false,
                              }
                            }
                          }
                          this.chartdata = [
                            {
                              name: 'Magnitud del viento',
                              data: this.chart_data
                            }
                          ];
                          this.loaded = true;
                        }
                      }
                    )
                }
                catch{

                }
            },
            date_format: function(value){
              if (!value) return '';
              let date = [];
              date = value.split(' ')[1];
              date = date.split(':');
              return date[0] + 'h';
            },
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

<style scoped>
  @media (min-width: 1200px){
    .custom_container {
        max-width: 720px;
    }

  }
  @media (min-width: 992px){
    .custom_container {
        max-width: 720px;
    }
  }
</style>
