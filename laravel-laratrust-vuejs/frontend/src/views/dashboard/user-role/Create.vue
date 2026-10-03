<template>
  <BackOneRecord />
  <div class="row mt-3">
    <div class="col-md-12" v-if="errors">
      <AlertMessage variant="danger" :message="errors?.role_id[0]" icon="triangle-exclamation" />
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-12">
      إضافة دور للمستخدم  <span class="badge text-bg-dark fs-6">{{ user.name }}</span>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-12">
      <form @submit.prevent="onSubmit" class="row g-3">
        <div class="col-md-12">
          <label for="role-id" class="form-label">اﻷدوار</label>
          <select
            class="form-select"
            name="role_id"
            v-model="formData.role_id"
          >
            <option disabled selected>اختار دورا</option>
            <option v-for="role in roles" :key="role.id" :value="role.id">
              {{ role.name }}
            </option>
          </select>
          <span class="form-text fs-6"
            >لا يمكن تكرار الدور الرجاء التأكد قبل الإضافة</span
          >
        </div>
        <div class="col-12">
          <button class="btn btn-dark">
            <span class="p-2">إضافة دور</span>
            <span><font-awesome-icon :icon="['fas', 'square-plus']" /></span>
          </button>
        </div>
      </form>
    </div>
  </div>
  <div class="row mt-3" v-if="isUserRolesObjectEmpty">
    <div class="col-md-12">
      <span class="fw-bold fs-6">لا توجد أي أدوار</span>
    </div>
  </div>
  <div class="row mt-3" v-else>
    <div class="col-md-12">
      <span class="fw-semibold fs-5">اﻷدوار الحالية</span>
      <ul class="nav mt-2">
        <li class="nav-item" v-for="role in user.roles" :key="role.id">
          <a class="nav-link">
            <div class="badge text-bg-dark fw-semibold fs-6 mr-2">
              {{ role.name }}
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import {
  defineComponent,
  computed,
  onMounted,
  reactive,
  ref,
  onBeforeMount,
} from "vue";
import { useUserRoleStore } from "@/stores/userRole";
import { useUserStore } from "@/stores/user";
import { useRoleStore } from "@/stores/role";
import { useRouter } from "vue-router";
import BackOneRecord from "@/components/bootstrap/BackOneRecord";
import AlertMessage from "@/components/bootstrap/AlertMessage";

defineOptions({ name : 'UserRoleCreate' })

  const props = defineProps({ id:{ type : String } })

    const roleStore = useRoleStore();
    const userRoleStore = useUserRoleStore();
    const userStore = useUserStore();
    const router = useRouter();

    const formData = reactive({
      user_id: props.id,
      role_id: "",
    });

    const user = computed(() => {
      return userStore.user;
    });
    const roles = computed(() => {
      return roleStore.roles;
    });
    const errors = computed(() => {
      return userRoleStore.errors;
    });

    const isUserRolesObjectEmpty = computed(() => {
      return userStore.user?.roles?.length === 0 ? true : false;
    });

    const onSubmit = async () => {
      await userRoleStore.userRoleCreate(props.id, formData);
    };
    // onBeforeMount(() => {
    //     // console.log(userRoleStore.roles)
    //     console.log(userStore.user)
    //     console.log('Component is about to be mounted.')
    // });
    onMounted(() => {
      userRoleStore.userRolesIndex(props.id);
      userStore.userShow(props.id);
      roleStore.rolesIndex();
    });
</script>

<style scoped></style>
