<template>
  <div class="row mt-3">
    <div class="col-md-12">
      <router-link :to="{ name: 'permissionCreate' }" class="btn btn-dark">
        <span class="p-2">إضافة صلاحيات</span>
        <span><font-awesome-icon :icon="['fas', 'square-plus']" /></span>
      </router-link>
    </div>
  </div>
  <div class="row mt-3" v-if="isPermissionsObjectEmpty">
    <div class="col-md-12">
      <AlertMessage
        variant="info"
        message="لا توجد أي صلاحيات"
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
              <th>#</th>
              <th>الاسم</th>
              <th>اسم العرض</th>
              <th>الوصف</th>
              <th colspan="2">العمليات</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr v-for="(permission, index) in permissions" :key="permission.id">
              <td>{{ index + 1 }}</td>
              <td>{{ permission.name }}</td>
              <td>{{ permission.display_name }}</td>
              <td>{{ permission.description }}</td>
              <td>
                <router-link
                  :to="{
                    name: 'permissionEdit',
                    params: { id: permission.id },
                  }"
                >
                  <font-awesome-icon
                    :icon="['fas', 'fa-edit']"
                    class="text-dark"
                    size="lg"
                  />
                </router-link>
              </td>
              <td>
                <a
                  href="javascript:void(0);"
                  @click="permissionDelete(permission.id)"
                >
                  <font-awesome-icon
                    :icon="['fas', 'fa-trash']"
                    class="text-dark"
                    size="lg"
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
import { defineComponent, onMounted, ref, computed, inject } from "vue";
import { usePermissionStore } from "@/stores/permission";
import AlertMessage from "@/components/bootstrap/AlertMessage";
defineOptions({ name: "PermissionsIndex" });
const permissionStore = usePermissionStore();

const swal = inject("$swal");

const permissions = computed(() => {
  return permissionStore.permissions;
});

const isPermissionsObjectEmpty = computed(() => {
  return permissionStore.permissions.length === 0 ? true : false;
});

onMounted(() => {
  permissionStore.permissionsIndex();
});

const permissionDelete = async (permission_id) => {
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
      permissionStore.permissionDelete(permission_id);
    }
  });
};
</script>

<style scoped></style>
