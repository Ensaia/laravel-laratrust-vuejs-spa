<template>
<footer class="app-footer">
  <div class="float-end d-none d-sm-inline">Version 4.0.0</div>
  <strong>&copy; {{ currentYear }} Your Company</strong>
</footer>
</template>
<script setup>
import { ref } from 'vue'
defineOptions({ name: "AppFooter" });
const currentYear = ref(new Date().getFullYear())
</script>