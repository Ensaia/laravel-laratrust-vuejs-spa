<template>
  <button class="btn btn-dark" type="submit" name="submit">
    <span class="p-2">تحديث البيانات</span>
    <span><font-awesome-icon :icon="['fas', 'edit']"></font-awesome-icon></span>
  </button>
</template>

<script setup>
defineOptions({ name: "EditButton" });
</script>

<style scoped></style>
