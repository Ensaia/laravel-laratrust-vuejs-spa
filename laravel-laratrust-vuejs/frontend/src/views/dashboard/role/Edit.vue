<template>
  <!-- <BackOneRecord /> -->
  <div class="row mt-3">
    <div class="col-md-12">
      <form class="row g-3" @submit.prevent="roleUpdate">
        <div class="col-md-6">
          <label for="name" class="form-label">الاسم</label>
          <input
            type="text"
            id="name"
            name="name"
            :class="['form-control', { 'is-invalid': 'name' in errors }]"
            placeholder="اﻻسم"
            v-model="role.name"
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
            v-model="role.display_name"
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
            v-model="role.description"
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
// import backOneRecord from "@/components/bootstarp/BackOneRecord";
import { defineComponent, onMounted, computed } from "vue";
import BackOneRecord from "@/components/bootstrap/BackOneRecord";
import EditButton from "@/components/bootstrap/EditButton";
import { useRoleStore } from "@/stores/role";
import { displayValidationError } from "@/helpers/displayValidationError";

defineOptions({ name: "RoleEdit" });

const props = defineProps({
  id: {
    type: String,
  },
});

const roleStore = useRoleStore();

const role = computed(() => {
  return roleStore.role;
});
const errors = computed(() => {
  return roleStore.errors;
});
onMounted(() => {
  roleStore.roleShow(props.id);
});
const roleUpdate = async () => {
  await roleStore.roleUpdate(props.id, role.value);
};
</script>

<style scoped></style>
