<template>
  <button class="btn btn-dark" type="submit" name="submit">
    <span class="p-2">إضافة البيانات</span>
    <span
      ><font-awesome-icon :icon="['fas', 'square-plus']"></font-awesome-icon
    ></span>
  </button>
</template>

<script setup>
defineOptions({ name: "CreateButton" });
</script>

<style scoped></style>
