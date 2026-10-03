<template>
  <BackOneRecord />
  <div class="row mt-3">
    <div class="col-md-12" v-if="errors">
      <AlertMessage
        variant="danger"
        :message="errors?.permission_id[0]"
        icons="triangle-exclamation"
      />
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-12">
      <form @submit.prevent="onSubmit" class="row g-3">
        <div class="col-md-12">
          <label for="permission-id" class="form-label">اﻷذونات</label>
          <select
            class="form-select"
            as="select"
            name="permission_id"
            v-model="formData.permission_id"
          >
            <option disabled selected>اختار إذنا</option>
            <option
              v-for="permission in permissions"
              :key="permission.id"
              :value="permission.id"
            >
              {{ permission.name }}
            </option>
            <!-- :selected="value && value.includes(permission.id)" -->
          </select>
          <span class="form-text fs-6"
            >لا يمكن تكرار الإذن الرجاء التأكد قبل الإضافة</span
          >
        </div>
        <div class="col-md-12">
          <button class="btn btn-dark">
            <span class="p-2">إضافة إذن</span>
            <span><font-awesome-icon :icon="['fas', 'square-plus']" /></span>
          </button>
        </div>
      </form>
    </div>
  </div>
  <div class="row mt-3" v-if="rolePermissions.length === 0">
    <div class="col-md-12">
      <span class="fw-semibold fs-5">لا توجد أذونات حاليا</span>
    </div>
  </div>
  <div class="row mt-3" v-else>
    <div class="col-md-12">
      <span class="fw-semibold fs-5">اﻷذونات الحالية</span>
      <ul class="nav mt-2">
        <li
          class="nav-item"
          v-for="permission in rolePermissions"
          :key="permission.id"
        >
          <a class="nav-link" href="javascript:void(0);">
            <span class="badge badge-dark text-dark fw-semibold fs-6 mr-2">
              {{ permission.name }}
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { defineComponent, computed, onMounted, reactive } from "vue";
import BackOneRecord from "@/components/bootstrap/BackOneRecord";
import AlertMessage from "@/components/bootstrap/AlertMessage";
import { usePermissionStore } from "@/stores";
import { useRolePermissionStore } from "@/stores";

defineOptions({
  name: "RolePermissionCreate",
});
const props = defineProps({ id: { type: String } });

const permissionStore = usePermissionStore();
const rolePermissionStore = useRolePermissionStore();

const formData = reactive({
  role_id: "",
});

const permissions = computed(() => {
  return permissionStore.permissions;
});

const rolePermissions = computed(() => {
  return rolePermissionStore.permissions;
});

const errors = computed(() => {
  return rolePermissionStore.errors;
});

const onSubmit = async () => {
  await rolePermissionStore.rolePermissionCreate(props.id, formData);
};

onMounted(() => {
  rolePermissionStore.rolePermissionsIndex(props.id);
  permissionStore.permissionsIndex();
});
</script>

<style scoped></style>
