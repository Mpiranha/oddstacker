<template>
  <div class="row">
    <div class="col-12">
      <div class="d-flex flex-row justify-content-center flex-wrap mb-2">
        <div class="all-btn bg-white mr-1">
          <a :class="{ 'all-active' : allActive }" @click="changeActiveState(true, false, false, false)" class="nav-link p-2 bg-white text-dark">ALL</a>
        </div>
        <div class="h-2-h-btn bg-white mr-1 flex-fill text-center">
          <a :class="{ 'head-active' : headActive }" @click="changeActiveState(false, true, false, false)" class="nav-link p-2 bg-white text-dark">HEAD TO HEAD</a>
        </div>
        <div class="double-up-btn bg-white mr-1 flex-fill text-center">
          <a :class="{ 'double-active' : doubleActive }" @click="changeActiveState(false, false, true, false)" class="nav-link p-2 bg-white text-dark">DOUBLE UP</a>
        </div>
        <div class="premium-btn bg-white flex-fill text-center">
          <a :class="{ 'premium-active' : premiumActive }" @click="changeActiveState(false, false, false, true)" class="nav-link p-2 bg-white text-dark">PREMIUM</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            allActive: true,
            headActive: false,
            doubleActive: false,
            premiumActive: false
        }
    },

    methods: {
      changeActiveState: function(allState, headState, doubleState, premiumState) {
        this.allActive = allState;
        this.headActive = headState;
        this.doubleActive = doubleState;
        this.premiumActive = premiumState;
      }
    }
};
</script>

<style scoped>
a {
  font-size: 0.6rem !important;
}



.nav-link {
  font-size: 0.7rem;
  border-radius: 0;
  font-weight: 700;
}

.nav-pills .active {
  background-color: black !important;
  color: white !important;
  border-radius: 0;
}

.nav-link {
  display: block;
  padding: 0.3rem 0.4rem;
}

.nav-item {
  font-size: 0.6rem;
}

.all-btn .all-active {
  background-color: black !important;
  color: white !important;
}

.h-2-h-btn .head-active {
  background-color: #e50101 !important;
  color: white !important;
}

.double-up-btn .double-active {
  background-color: #0b5cc7 !important;
  color: white !important;
}

.premium-btn .premium-active {
  background-color: #ceb429 !important;
  color: white !important;
}


@media screen and (max-width: 360px) {
}
</style>


