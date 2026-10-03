<template>
  <div class="row">
    <div class="col-md-12">
      <router-link
        :to="{ name: 'userPermissionCreate', params: { id: user.id } }"
        class="btn btn-dark"
      >
        <span class="p-2"> إضافة إذن</span>
        <span><font-awesome-icon :icon="['fas', 'plus-square']" /></span>
      </router-link>
    </div>
  </div>
  <div class="row mt-3" v-if="isUserPermissionsObjectEmpty">
    <div class="col-md-12">
      <AlertMessage
        variant="info"
        message="ﻻتوجد أي إذونات"
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
              <th>اسم المستخدم</th>
              <th>اﻷدوار</th>
              <th colspan="1">العمليات</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr
              v-for="(permission, index) in user.permissions"
              :key="permission.id"
            >
              <td>{{ index + 1 }}</td>
              <td>{{ user.name }}</td>
              <td>
                <span class="badge text-bg-dark fs-6">{{
                  permission.name
                }}</span>
              </td>
              <td>
                <a
                  href="javascript:void(0);"
                  @click="userPermissionDelete(user.id, permission.id)"
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
import { defineComponent, computed, onMounted, reactive, inject } from "vue";
import { useUserStore } from "@/stores/user";
import { useUserPermissionStore } from "@/stores/userPermission";
import AlertMessage from "@/components/bootstrap/AlertMessage";
import { storeToRefs } from "pinia";

defineOptions({ name: "UserPermissionsIndex" });
const props = defineProps({ id: { type: String } });
const userStore = useUserStore();
const userPermissionStore = useUserPermissionStore();
const swal = inject("$swal");
const formData = reactive({
  user_id: props.id,
  permission_id: "",
});

const { user } = storeToRefs(userStore);

const isUserPermissionsObjectEmpty = computed(() => {
  return userStore.user?.permissions?.length === 0 ? true : false;
});

onMounted(() => {
  userStore.userShow(props.id);
});

const userPermissionDelete = async (user_id, permission_id) => {
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
      userPermissionStore.userPermissionDelete(user_id, permission_id);
    }
  });
};
</script>

<style scoped></style>
