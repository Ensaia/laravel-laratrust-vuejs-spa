<template>
  <!-- Navbar -->
  <Navbar />
  <!-- main -->
  <div class="container">
    <router-view></router-view>
  </div>
  <!-- footer -->
  <Footer />
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useAuthStore } from "@/stores/auth";
import Navbar from "@/components/bootstrap/Navbar";
import Footer from "@/components/bootstrap/Footer";
defineOptions({ name: "HomeLayout" });
const authStore = useAuthStore();
const currenYear = ref(new Date().getFullYear());
</script>

<style scoped>
.navbar a {
  color: #000000;
  font-size: 16px;
  /*font-weight: bold;*/
}
.navbar-nav > .active > a:hover,
.navbar-nav > li > a:hover,
.navbar-nav > li > a:focus {
  background-color: #efefef;
  color: #000000;
  /* font-size: 17px; */
  border-radius: 5px;
}
</style>
