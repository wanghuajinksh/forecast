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
            <div style="position:relative;">
                <line-chart
                    v-if="loaded"
                    :chart-data="chartdata"
                    :options="options" :height="280"/>
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
import LineChart from '../chart';
    export default {
        data() {
            return{
                loaded: false,
                options: {
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
                chartdata: null,
                chart_data: [],
                chart_labels: [],
            }
        },
        methods: {
            init: function() {
                this.loaded = true;
            }
        },
        async mounted () {
            this.loaded = false;
            this.flag = false;

            this.init();
        },
        components: {
            lineChart: LineChart,
        }
    }
</script>
