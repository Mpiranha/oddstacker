<template>
  <div class="container-fliud sticky-top">
    <div class="jumbotron bg-dark pb-2">
      <nav class="d-flex justify-content-between">
        <span id="side" class="dark-blue-text">
          <i class="fa fa-bars fa-2x f-2"></i>
        </span>
        <h1 class="text-center text-uppercase f-2 m-0 pl-2">ODDSTACKER</h1>
        <button id="right-btn" class="btn right-btn pt-0 pb-0 pr-2 pl-2 text-center">N{{ wallet.balance }} <i class="fas fa-angle-down ml-1 angle-down"></i></button>
      </nav>
      <h2 class="text-uppercase text-center f-1 mt-3">{{ title }}</h2>
    </div>

    <!-- Top-Nav -->
    <div id="top-bar" class="contaier fixed-top">
      <div class="row">
        <div class="col-sm-12">
          <div class="d-flex card-heade">
            <div class="mr-3">
              <i class="fa fa-user-circle fa-5x icon"></i>
            </div>
            <div class="flex-grow-1 d-flex flex-column">
              <div class="name-2">{{ user.username }}</div>
              <div class="name-2">User ID: 4313522</div>
              <div class="job">N{{ wallet.balance }}</div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex">
              <a href="/account" class="yes btn-sm text-uppercase text-center top">Account</a>
              <a href="/cashier" class="yes btn-sm text-uppercase text-center top">Cashier</a>
            </div>
            <div class="d-flex">
              <a href="/result" class="yes btn-sm text-uppercase text-center top">My Stocks</a>
              <a href="" class="yes btn-sm text-uppercase text-center top">log out</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar -->
    <nav id="sidebar">
      <div class="card">
        <div class="card-header bg-user text-center">
          <button type="button" class="close text-light" id="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <i class="fa fa-user-circle text-white fa-5x"></i>
          <div class="name">{{ user.username }}</div>
          <div class="job">N{{ wallet.balance }}</div>
          <button class="btn red-btn">
            <a class="text-uppercase text-light">Top up</a>
          </button>
        </div>
        <!--list items-->
        <ul class="list-group list-group-flush scroll-y">
          <li class="list-group-item text-light f-1-1">
            <i class="fas fa-money-bill"></i><a class="text-white" href="/withdrawal">Withdrawal</a>
          </li>
          <li class="list-group-item text-light f-1-1">
            <i class="fas fa-scroll"></i><a class="text-white" href="/enter">Stock Lobby</a>
          </li>
          <li class="list-group-item text-light f-1-1">
            <i class="far fa-file-alt mr-4"></i><a class="text-white" href="/results">Results</a>
          </li>
          <li class="list-group-item text-light f-1-1">
            <i class="fa fa-question-circle mr-3"></i><a class="text-white" href="">How to Play</a>
          </li>
          <li class="list-group-item text-light f-1-1">
            <i class="fa fa-lightbulb mr-4"></i><a class="text-white" href="">Tips</a>
          </li>
          <li class="list-group-item text-light f-1-1">
            <i class="fas fa-handshake"></i><a class="text-white" href="">REFERAL</a>
          </li>
          <li class="list-group-item text-light f-1-1">
            <i class="fa fa-envelope mr-3"></i><a class="text-white" href="">Mails</a>
          </li>
          <li class="list-group-item text-light f-1-1">
            <i class="fa fa-trophy"></i><a class="text-white" href="">All Winners</a>
          </li>
          <li class="list-group-item text-light f-1-1">
            <i class="fas fa-comments"></i><a class="text-white" href="">FEED BACK</a>
          </li>
          <li class="list-group-item mb-10 text-light f-1-1">
            <i class="fas fa-sign-out-alt"></i><a class="text-white" href="/logout">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  props: ['user', 'title', 'wallet'],

  mounted: function(){}
};
</script>
<style>
.list-group-item i {
  margin-right: 0.8rem;
}

.bg-dark {
  background-color: #143363 !important;
}
.jumbotron {
  border-radius: 0px;
  padding: 20px;
  color: white;
  margin-bottom: 0;
}
.right-btn {
  border: 1px solid #eff;
  height: 18px;
  font-size: 12px;
  color: #eff;
  border-radius: 23px;
  background: #073453;
}

/*Top Bar*/
.card-heade {
  padding: 0.75rem 1.25rem;
  margin-bottom: 0;
  height: 120px;
  color: white;
  background-color: #143363;
  border-bottom: none;
}
.card-body {
  background: #143363;
  border-top: 1px solid rgb(233, 241, 241);
  color: white;
  padding-bottom: 22px;
}

.yes {
  margin: 0.5rem;
  color: white;
  border-radius: 0px;
}
/* .btn-lg, .btn-group-lg > .btn {
  
    border-radius: 58.3rem;
} */
.name-2 {
  font-size: 15px;
  font-weight: 200;
  color: white;
  /* margin-top: 20px; */
}
#top-bar {
  display: none;
}
.top {
  width: 100%;
  height: 20px;
  background: #fcfeff;
  position: relative;
  margin-top: 33px;
  color: #000000;
  z-index: 1;
}

.top:before {
  content: "";
  width: 100%;
  height: 0;
  position: absolute;
  top: -14px;
  left: 0;
  border-bottom: 15px solid #fcfeff;
  border-left: 15px solid #eee0;
  border-right: 15px solid #eee0;
}

.top:after {
  content: "";
  width: 100%;
  height: 0;
  position: absolute;
  top: 19px;
  left: 0;
  border-top: 15px solid #fcfeff;
  border-left: 15px solid #eee0;
  border-right: 15px solid #eee0;
  z-index: -1;
}
.btn-lg {
  line-height: 0.5;
}

/*Left sidebar*/
#sidebar {
  min-width: 250px;
  max-width: 250px;
  height: 100vh;
  position: fixed;
  top: 0;
  left: -250px;
  z-index: 9999;
}
.card {
  height: 100vh;
  border-radius: 0px;
  border: none;
}
.card-header {
  padding: 0.75rem 1.25rem;
  margin-bottom: 0;
  height: 250px;
  background-color: rgba(0, 0, 0, 0.03);
  border-bottom: none;
}

.list-group-item {
  background-color: #073453;
  height: 9vh;
  line-height: 32px;
  font-size: 1.3em;
  border: none;
}

.list-group-item:hover {
  background: #3248697c;
}
#close {
  position: absolute;
  top: 15px;
  left: 20px;
  font-size: 1.8rem;
}

.red-btn {
  width: 100%;
  margin-top: 18px;
  border-radius: 9px;
  padding: 10px;
  background: #e50101;
}

.name {
  font-size: 1rem;
  font-weight: 600;
  margin-top: 20px;
  color: white;
}

.job {
  font-size: 1rem;
  font-weight: 600;
  font-family: "Times New Roman", Times, serif;
  color: white;
}
</style>