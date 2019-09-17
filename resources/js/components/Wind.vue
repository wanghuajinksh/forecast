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
          </div>
        </div>
      </section>
      <section style="margin-top:60px;">
        <table class="table">
          <thead style="border-bottom: 2px solid #737373;">
            <th>Fecha</th>
            <th>Dir</th>
            <th>Vel</th>
          </thead>
          <tbody>
            <tr>
              <td>27/08|17:00</td>
              <td>274</td>
              <td>1.81</td>
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
