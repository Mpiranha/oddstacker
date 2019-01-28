<template>
  <div class="row">
    <div class="col-12">
      <div class="d-flex flex-row justify-content-center flex-wrap mb-3">
        <div class="all-btn bg-white mr-1">
          <a v-bind:class="{ active : isActive }" class="nav-link p-2 bg-white text-dark">ALL</a>
        </div>
        <div class="h-2-h-btn bg-white mr-1 flex-fill text-center">
          <a class="nav-link p-2 bg-white text-dark">HEAD TO HEAD</a>
        </div>
        <div class="double-up-btn bg-white mr-1 flex-fill text-center">
          <a class="nav-link p-2 bg-white text-dark">DOUBLE UP</a>
        </div>
        <div class="premium-btn bg-white flex-fill text-center">
          <a class="nav-link p-2 bg-white text-dark">PREMIUM</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            isActive: true
        }
    }
};
</script>

<style scoped>
a {
  font-size: 0.8rem !important;
}

.h-2-h-btn .active {
  background-color: #e50101 !important;
  color: white !important;
}

.double-up-btn .active {
  background-color: #0b5cc7 !important;
  color: white !important;
}

.premium-btn .active {
  background-color: #ffd700 !important;
  color: white !important;
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

.all-btn .active {
  background-color: black !important;
  color: white !important;
}

@media screen and (max-width: 360px) {
}
</style>


