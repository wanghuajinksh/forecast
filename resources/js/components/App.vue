<template>
  <div>
    <nav class="navbar nav_green">
      <!-- Brand -->
      <div class="navbar-brand">
        <a class="navbar-brand" href="https://vcmov.epsa.cl/" target="_blank"><i class="fa fa-long-arrow-left"></i></a>
        <span>Punta del ADCP</span>
      </div>
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" @click="sidebar">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
    <div class="bottom_nav">
      <div class="row">
        <div class="col-4">
          <div class="float-left date"><i class="fa fa-caret-left"></i>&nbsp;<span>27/08</span></div>
        </div>
        <div class="col-4">
          <div class="text-center">
            <div class="clock" @click="clock_flag=!clock_flag">
              <i class="fa fa-clock-o"></i>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="float-right date"><span>28/08</span>&nbsp;<i class="fa fa-caret-right"></i></div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="card clock_card" v-if="clock_flag">
      <div class="card-body text-center">
        <div class="row">
          <div class="col-12">
            <p><i class="fa fa-clock-o"></i>&nbsp;Updated 19:30</p>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <p>abc</p>
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
          </div>
          <div class="col-4">
            <p>abc</p>
            <div class="detail_data">
              <div class="row">
                <div class="col-12" style="padding:0;margin-top:-5px;">
                  <span style="font-size:35px;">11.9</span>
                  <span style="vertical-align: top;">m</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <p>abc</p>
            <div class="detail_data">
              <div class="row">
                <div class="col-12" style="padding:0;margin-top:-5px;">
                  <span style="font-size:35px;">12.1</span>
                  <span style="vertical-align: top;">s</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Side Bar -->
    <div class="sidebar animated" :class="sidebar_animation">
      <div class="top_text">
        <div class="float-left">Menu</div>
        <div class="float-right">
          <i class="fa fa-close fa-lg" @click="sidebar"></i>
        </div>
      </div>
      <ul id="menu">
        <div>
          <router-link to="/" tag="li" active-class="active" exact>
            <a>Wave</a>
          </router-link>
          <router-link to="/wind" tag="li" active-class="active">
            <a>Wind</a>
          </router-link>
        </div>
        <hr />
        <div class="area">
          <li><span>Punta del ADCP</span></li>
          <li><span>Bocana</span></li>
          <li><span>Estacion Practicos</span></li>
        </div>
      </ul>
    </div>

    <transition name="slide" mode="out-in">
      <router-view></router-view>
    </transition>    

    <footer class="text-center footer" >
      <h5>Empresa Portuaria San Antonio</h5>
      <p>Av. Barros Luco Nº1613, of. 8A</p>
      <p>San Antonio - Chile.</p>
      <p>Tel. (56) 35 2586000 / Fax (56) 35 2586010.</p>
      <br>
      <p><b><a href="#">© EPSA</a></b></p>
    </footer>
  </div>
</template>

<script>
  
  export default {
    data() {
      return {
        sidebar_flag: true,
        sidebar_animation: [this.sidebar_flag ? "slideInRight" : "slideOutRight"],
        clock_flag: false,
        
      };
    },
    async mounted () {
        
    },
    methods: {
      sidebar: function() {
        this.sidebar_animation = [
          this.sidebar_flag ? "slideInRight" : "slideOutRight"
        ];
        this.sidebar_flag = !this.sidebar_flag;
      },
      
    },
    created() {
      this.sidebar_animation = "display_none";
    },
    
  };
</script>

<style>
.display_none {
  display: none;
}
section {
  margin-top: 50px;
}
.slide-enter {
  opacity: 0;
}
.slide-enter-active {
  animation: slide-in 0.5s ease-out forwards;
  transition: opacity 0.5s;
}
.slide-leave {
}
.slide-leave-active {
  animation: slide-out 0.5s ease-out forwards;
  transition: opacity 0.5s;
  opacity: 0;
}
@keyframes slide-in {
  from {
    transform: translateY(100px);
  }
  to {
    transform: translateY(0);
  }
}
@keyframes slide-out {
  from {
    transform: translateY(0);
  }
  to {
    transform: translateY(20px);
  }
}
.animated {
  -webkit-animation-duration: 400ms;
  -moz-animation-duration: 400ms;
  animation-duration: 400ms;
}

.nav_green {
  background: #0e8cb3;
  color: white;
  padding: 2px 10px;
}
.nav_green .navbar-toggler {
  color: rgba(255, 255, 255, 0.5);
  border-color: rgba(255, 255, 255, 0.3);
}
.nav_green .navbar-brand {
  color: white;
}
.nav_green .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-width='3' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

.sidebar {
  position: fixed;
  top: 0;
  right: 0;
  width: 20em;
  height: 100%;
  padding: 0px;
  z-index: 1;
  background-color: #44484c;
  overflow-x: hidden;
  transition: 0.5s;
}
nav {
  height: 45px;
}
.bottom_nav {
  position: relative;
  height: 32px;
  padding: 4px 1px;
  background: #0a6d8c;
  color: white;
}
.bottom_nav .text-center i {
  font-size: 19px;
  margin-top: 2px;
}
.bottom_nav .date {
  cursor: pointer;
}
.bottom_nav .date i, .navbar-brand i {
  color:#f9ad1f;font-size:15px;
}
.navbar-brand {
  padding: 0;
}
.bottom_nav .clock {
  width: 35px;
  margin: auto;
  background: #0e8cb3;
}
.top_text {
  height: 45px;
  background: #1e96bb;
  /* font-family: Rubik; */
  font-size: 18px;
  color: #fff;
  padding-left: 10px;
  padding-top: 10px;
  padding-right: 10px;
}
.bottom_nav div.row {
  margin: 0;
}
#menu {
  padding-top: 20px;
}

a {
  text-decoration: none;
}
#menu li a,
#menu li {
  color: white;
  padding-bottom: 10px;
}
#menu .area li span {
  cursor: pointer;
}
#menu .area li span:hover {
  color: #a7a6a6;
}
#menu .active a {
  color: #a7a6a6;
  cursor: default;
  text-decoration: none;
}
i {
  cursor: pointer;
}

li {
  list-style-type: none;
}
hr {
  border-top: 1px solid rgba(251, 247, 247, 0.2);
}
.clock_card {
  width: 500px;
  margin: 3px auto;
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
  border: none;
}
.clock_card p {
  margin-bottom: 5px;
}
.card-body {
  padding: 10px;
}
.detail_data {
  width: 70px;
  margin: auto;
  color: rgb(73, 144, 226);
}
.detail_data i {
  font-size: 40px;
  color: rgb(73, 144, 226);
  cursor:default;
}
table {
  text-align: center;
  width: 600px;
  margin: auto;
  margin-top: 30px;
}
.table thead th, .table th, .table td {
  border: none;
}
.footer {
  margin-top: 50px;
  padding: 20px;
  color: white;
  background-image: url(/img/epsa_footer_lg-2dc54a1a6a.jpg);
  background-size: cover;
  background-position: center;
}
.footer p {
  margin-bottom: 5px;
}
@media only screen and (max-width: 600px) {
  .clock_card, table {
    width: 100%;
  }
}
</style>