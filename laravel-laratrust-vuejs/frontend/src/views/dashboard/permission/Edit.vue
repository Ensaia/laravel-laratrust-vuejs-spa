<template>
  <BackOneRecord />
  <div class="row mt-3">
    <div class="col-md-12">
      <form class="row g-3" @submit.prevent="permissionUpdate">
        <div class="col-md-6">
          <label for="name" class="form-label">الاسم</label>
          <input
            type="text"
            id="name"
            name="name"
            :class="['form-control', { 'is-invalid': 'name' in errors }]"
            placeholder="اﻻسم"
            v-model="permission.name"
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
            v-model="permission.display_name"
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
            v-model="permission.description"
            rows="3"
          ></textarea>
          <div v-if="'description' in errors" class="invalid-feedback">
            {{ displayValidationError(errors, "description") }}
          </div>
        </div>
        <div class="col-md-12">
          <EditButton />
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { defineComponent, onMounted, ref, computed } from "vue";
import BackOneRecord from "@/components/bootstrap/BackOneRecord";
import { usePermissionStore } from "@/stores/permission";
import { displayValidationError } from "@/helpers/displayValidationError";
import EditButton from "@/components/bootstrap/EditButton";
defineOptions({ name: "PermissionEdit" });
const props = defineProps({
  id: {
    type: String,
  },
});

const permissionStore = usePermissionStore();
const errors = computed(() => {
  return permissionStore.errors;
});
const permission = computed(() => {
  return permissionStore.getPermission;
});
onMounted(() => {
  permissionStore.permissionShow(props.id);
});
const permissionUpdate = async () => {
  permissionStore.permissionUpdate(props.id, permission.value);
};
</script>

<style scoped></style>
