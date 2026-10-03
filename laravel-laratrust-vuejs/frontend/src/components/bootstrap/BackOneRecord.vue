<template>
  <div class="row mt-3">
    <div class="col-md-12">
      <button
        class="btn btn-dark"
        @click="backOneRecord"
        type="button"
        name="button"
      >
        <span
          ><font-awesome-icon
            :icon="['fas', 'angles-right']"
          ></font-awesome-icon
        ></span>
        <span class="p-2">الرجوع للخلف</span>
      </button>
    </div>
  </div>
</template>

<script setup>
import { useRouter } from "vue-router";
defineOptions({ name: "BackOneRecord" });
const router = useRouter();
const backOneRecord = () => {
  router.go(-1);
};
</script>

<style scoped></style>
