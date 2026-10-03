<template>
  <BackOneRecord />
  <div class="row mt-3">
    <div class="col-md-12">
      <router-link
        :to="{ name: 'rolePermissionCreate', params: { id: role.id } }"
        class="btn btn-dark"
      >
        <span class="p-2"> إضافة إذن</span>
        <span><font-awesome-icon :icon="['fas', 'plus-square']" /></span>
      </router-link>
    </div>
  </div>
  <div class="row mt-3" v-if="isRolePermissionsObjectEmpty">
    <div class="col-md-12">
      <AlertMessage
        variant="info"
        message="لا توجد أي أذونات"
        icon="circle-info"
      />
    </div>
  </div>
  <div class="row mt-3" v-else>
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="text-center">
            <tr>
              <th scope="col">#</th>
              <th scope="col">اسم الدور</th>
              <th scope="col">الصلاحيات</th>
              <th scope="col" colspan="2"
              >العمليات</th
              >
            </tr>
          </thead>
          <tbody class="text-center">
            <tr
                    v-for="(permission, index) in role.permissions"
                    :key="permission.id"
            >
              <td>{{ index + 1 }}</td>
              <td>{{ role.name }}</td>
              <td>{{ permission.name }}</td>
              <td>
                <a
                        href="javascript:void(0);" @click="rolePermissionDelete(role.id, permission.id)">
                  <font-awesome-icon
                          :icon="['fas', 'fa-trash']"
                          size="lg"
                          class="text-dark"
                  />
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineComponent, computed, onMounted, reactive, inject } from "vue";
import { useUserStore } from "@/stores";
import { useRolePermissionStore } from "@/stores";
import BackOneRecord from "@/components/bootstrap/BackOneRecord";
import AlertMessage from "@/components/bootstrap/AlertMessage";

defineOptions({ name: "RolePermissionsIndex" });
const props = defineProps({ id: { type: String } });

const rolePermissionStore = useRolePermissionStore();

const swal = inject("$swal");

const formData = reactive({
  permission_id: props.id,
});

const role = computed(() => {
  return rolePermissionStore.role;
});
const isRolePermissionsObjectEmpty = computed(() => {
  return rolePermissionStore.permissions.length === 0 ? true : false;
});

onMounted(() => {
  rolePermissionStore.rolePermissionsIndex(props.id);
});

const rolePermissionDelete = async (role_id, permission_id) => {
  swal({
    title: "هل أنت متأكد ؟",
    text: "سيتم حذف جميع البيانات وﻻ يمكن استرجاعها !!!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#4CAF50",
    cancelButtonColor: "#f44336",
    confirmButtonText: "حذف",
    cancelButtonText: "إلغاء",
  }).then((result) => {
    if (result.isConfirmed) {
      rolePermissionStore.rolePermissionDelete(role_id, permission_id);
    }
  });
};
</script>

<style scoped></style>
