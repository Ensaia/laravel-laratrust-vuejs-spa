<template>
  <div class="row">
    <div class="col-md-12">
      <router-link :to="{ name: 'roleCreate' }" class="btn btn-dark">
        <span class="p-2">إضافة دور</span>
        <span
          ><font-awesome-icon :icon="['fas', 'square-plus']"></font-awesome-icon
        ></span>
      </router-link>
    </div>
  </div>
  <div class="row mt-3" v-if="isRolesObjectEmpty">
    <div class="col-md-12">
      <AlertMessage
        variant="info"
        message="لا توجد أي أدوار"
        icon="circle-info"
      />
    </div>
  </div>
  <div class="row mt-3" v-else>
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered responsive">
          <thead class="text-center">
            <tr>
              <th>#</th>
              <th>الاسم</th>
              <th>اسم العرض</th>
              <th>الوصف</th>
              <th>اﻷذونات</th>
              <th colspan="2">العمليات</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr v-for="(role, index) in roles" :key="role.id">
              <td>{{ index + 1 }}</td>
              <td>{{ role.name }}</td>
              <td>{{ role.display_name }}</td>
              <td>{{ role.description }}</td>
              <td>
                <router-link
                  :to="{ name: 'rolePermissions', params: { id: role.id } }"
                  class=""
                >
                  <font-awesome-icon
                    :icon="['fas', 'fa-eye']"
                    size="lg"
                    class="text-dark"
                  />
                </router-link>
              </td>
              <td>
                <router-link
                  :to="{ name: 'roleEdit', params: { id: role.id } }"
                  class=""
                >
                  <font-awesome-icon
                    :icon="['fas', 'fa-edit']"
                    size="lg"
                    class="text-dark"
                  />
                </router-link>
              </td>
              <td>
                <a
                  href="javascript:void(0);"
                  @click="deleteRole(role.id)"
                  class=""
                >
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
defineOptions({
  name: "RolesIndex",
});

import { useRoleStore } from "@/stores/role";
import { onMounted, ref, computed, inject } from "vue";
import AlertMessage from "@/components/bootstrap/AlertMessage";

const roleStore = useRoleStore();

const swal = inject("$swal");

const roles = computed(() => {
  return roleStore.getRoles;
});
const isRolesObjectEmpty = computed(() => {
  return roleStore.roles.length === 0 ? true : false;
});
onMounted(() => {
  roleStore.rolesIndex();
});

const deleteRole = async (role_id) => {
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
      roleStore.roleDelete(role_id);
    }
  });
};
</script>

<style scoped></style>
