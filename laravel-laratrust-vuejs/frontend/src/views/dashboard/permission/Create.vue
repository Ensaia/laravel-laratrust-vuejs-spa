<template>
  <BackOneRecord />
  <div class="row mt-3">
    <div class="col-md-12">
      <form class="row g-3" @submit.prevent="permissionCreate">
        <div class="col-md-6">
          <label for="name" class="form-label">الاسم</label>
          <input
            type="text"
            id="name"
            name="name"
            :class="['form-control', { 'is-invalid': 'name' in errors }]"
            placeholder="اﻻسم"
            v-model="formData.name"
          />
          <div v-if="'name' in errors" class="invalid-feedback">
            {{ displayValidationError(errors, "name") }}
          </div>
        </div>
        <div class="col-md-6">
          <label for="display-name" class="form-label">اسم العرض</label>
          <input
            type="text"
            id="display-name"
            name="display_name"
            :class="[
              'form-control',
              { 'is-invalid': 'display_name' in errors },
            ]"
            placeholder="اسم العرض"
            v-model="formData.display_name"
          />
          <div v-if="'display_name' in errors" class="invalid-feedback">
            {{ displayValidationError(errors, "display_name") }}
          </div>
        </div>
        <div class="col-md-12">
          <label for="description" class="form-label">الوصف</label>
          <textarea
            id="description"
            name="description"
            :class="['form-control', { 'is-invalid': 'description' in errors }]"
            placeholder="الوصف"
            v-model="formData.description"
            rows="3"
          ></textarea>
          <div v-if="'description' in errors" class="invalid-feedback">
            {{ displayValidationError(errors, "description") }}
          </div>
        </div>
        <div class="col-md-12">
          <CreateButton />
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import BackOneRecord from "@/components/bootstrap/BackOneRecord";
import { defineComponent, reactive, computed } from "vue";
import { displayValidationError } from "@/helpers/displayValidationError";
import CreateButton from "@/components/bootstrap/CreateButton";
import { usePermissionStore } from "@/stores/permission";
defineOptions({ name: "PermissionCreate" });
const permissionStore = usePermissionStore();
const formData = reactive({
  name: "",
  display_name: "",
  description: "",
});

const errors = computed(() => {
  return permissionStore.errors;
});

const permissionCreate = async () => {
  await permissionStore.permissionCreate(formData);
};
</script>

<style scoped></style>
