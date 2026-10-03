<template>
  <BackOneRecord />
  <div class="row mt-3">
    <div class="col-md-12">
      <router-link
        :to="{ name: 'userRoleCreate', params: { id: user.id } }"
        class="btn btn-dark"
      >
        <span class="p-2"> إضافة دور</span>
        <span><font-awesome-icon :icon="['fas', 'plus-square']" /></span>
      </router-link>
    </div>
  </div>
  <div v-if="isUserRolesObjectEmpty" class="row mt-3">
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
            <tr v-for="(role, index) in user.roles" :key="role.id">
              <td>{{ index + 1 }}</td>
              <td>{{ user.name }}</td>
              <td>
                <div class="badge text-bg-dark fs-6">{{ role.name }}</div>
              </td>
              <td>
                <a
                  href="javascript:void(0);"
                  @click="userRoleDelete(user.id, role.id)"
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
import {
  defineComponent,
  computed,
  onMounted,
  reactive,
  inject,
  ref,
} from "vue";
import { useUserStore } from "@/stores/user";
import { useUserRoleStore } from "@/stores/userRole";
import { storeToRefs } from "pinia";
import BackOneRecord from "@/components/bootstrap/BackOneRecord";
import AlertMessage from "@/components/bootstrap/AlertMessage";

defineOptions({ name: "UserRolesIndex" });
const props = defineProps({
  id: {
    type: String,
  },
});
const userStore = useUserStore();
const userRoleStore = useUserRoleStore();
const swal = inject("$swal");
const formData = reactive({
  user_id: props.id,
  role_id: "",
});

const { user } = storeToRefs(userStore);

const isUserRolesObjectEmpty = computed(() => {
  return userStore.user?.roles?.length === 0 ? true : false;
});

onMounted(() => {
  userStore.userShow(props.id);
});

const userRoleDelete = async (user_id, role_id) => {
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
      userRoleStore.userRoleDelete(user_id, role_id);
    }
  });
};
</script>

<style scoped></style>
