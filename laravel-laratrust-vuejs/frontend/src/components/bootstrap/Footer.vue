<template>
<div class="container">
    <footer class="pt-3 my-3 text-body-secondary border-top">
        Created by the Bootstrap team &middot; &copy; {{ currentYear }} </footer>
</div>
</template>

<script setup>
    defineOptions({name: 'Footer'})
    import {
        ref,
    } from 'vue'
      const currentYear = ref(new Date().getFullYear())
</script>

<style scoped>
.footer {
  color:#000;
  font-size: 16px;
}
</style>
