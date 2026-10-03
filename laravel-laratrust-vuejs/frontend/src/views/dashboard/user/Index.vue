<template>
  <!--    <CRow class="mt-4">-->
  <!--        <CCol>-->
  <!--        <UserSearch />-->
  <!--        </CCol>-->
  <!--    </CRow>-->
  <div class="row mt-4">
    <div class="col-md-12">
      <!--                    <Transition name="fade">-->
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="text-center">
            <tr>
              <th>#</th>
              <th>اسم المستخدم</th>
              <th>البريد اﻷلكتروني</th>
              <th>حالة الحساب</th>
              <th>اﻷدوار</th>
              <th>اﻷدوار الحالية</th>
              <th>اﻷذونات الحالية</th>
              <th>اﻷذونات</th>
              <th colspan="2">العمليات</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr v-for="(user, index) in users.data" :key="user.id">
              <td>{{ index + 1 }}</td>
              <td>{{ user.name }}</td>
              <td>{{ user.email }}</td>
              <td>
                <div v-if="user.is_email_verified != ''">
                  <span class="badge text-bg-dark fs-6">الحساب مفعل</span>
                </div>
                <div v-else>
                  <span class="badge text-bg-dark fs-6">الحساب غير مفعل</span>
                </div>
              </td>
              <td>
                <router-link
                  :to="{ name: 'userRoles', params: { id: user.id } }"
                >
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <font-awesome-icon
                        :icon="['fas', 'edit']"
                        size="lg"
                        class="text-dark"
                      />
                    </li>
                    <li class="list-inline-item">|</li>
                    <li class="list-inline-item">
                      <font-awesome-icon
                        :icon="['fas', 'plus-square']"
                        size="lg"
                        class="text-dark"
                      />
                    </li>
                  </ul>
                </router-link>
              </td>
              <td>
                <div v-if="user.roles != 0">
                  <div v-for="role in user.roles" :key="role.id">
                    <span class="badge text-bg-dark fs-6 m-1">{{
                      role.name
                    }}</span>
                  </div>
                </div>
                <div v-else>
                  <span class="badge text-bg-dark fs-6"
                    >ﻻ توجد أدوار حاليا</span
                  >
                </div>
              </td>
              <td>
                <div v-if="user.permissions != 0">
                  <div
                    v-for="permission in user.permissions"
                    :key="permission.id"
                  >
                    <span class="badge text-bg-dark fs-6 m-1">{{
                      permission.name
                    }}</span>
                  </div>
                </div>
                <div v-else>
                  <span class="badge text-bg-dark fs-6"
                    >ﻻ توجد أذونات حاليا</span
                  >
                </div>
              </td>
              <td>
                <router-link
                  :to="{ name: 'userPermissions', params: { id: user.id } }"
                >
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <font-awesome-icon
                        :icon="['fas', 'edit']"
                        size="lg"
                        class="text-dark"
                      />
                    </li>
                    <li class="list-inline-item">|</li>
                    <li class="list-inline-item">
                      <font-awesome-icon
                        :icon="['fas', 'plus-square']"
                        size="lg"
                        class="text-dark"
                      />
                    </li>
                  </ul>
                </router-link>
              </td>
              <td>
                <router-link
                  :to="{ name: 'userEdit', params: { id: user.id } }"
                >
                  <font-awesome-icon
                    :icon="['fas', 'fa-edit']"
                    size="lg"
                    class="text-dark"
                  />
                </router-link>
              </td>
              <td>
                <a href="javascript:void(0);" @click="userDelete(user.id)">
                  <font-awesome-icon
                    :icon="['fas', 'fa-trash']"
                    size="lg"
                    class="text-dark mt-1"
                  />
                </a>
              </td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <td colspan="10">
                <bootstrap5-pagination
                  :data="users"
                  @pagination-change-page="userStore.usersIndex"
                >
                  <span slot="prev-nav">السابق</span>
                  <span slot="next-nav">التالي</span>
                </bootstrap5-pagination>
              </td>
            </tr>
          </thead>
        </table>
      </div>
      <!--                    </Transition>-->
    </div>
  </div>
</template>

<script setup>
import { useAuthStore } from "@/stores/auth";
import { useUserStore } from "@/stores/user";
import { defineComponent, computed, onMounted, inject, ref } from "vue";
import { Bootstrap5Pagination } from "laravel-vue-pagination";
import UserSearch from "@/components/bootstrap/UserSearch";

defineOptions({
  name: "UsersIndex",
});

const authStore = useAuthStore();
const userStore = useUserStore();

let page = ref(1);

const swal = inject("$swal");

const users = computed(() => {
  return userStore.users;
});

const userPaginate = async (page) => {
  await userStore.usersIndex(page);
};

onMounted(() => {
  userPaginate();
});

const userDelete = async (user_id) => {
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
      userStore.userDelete(user_id);
    }
  });
};


</script>

<style scoped>
.dg-btn--ok {
  border-color: green !important;
  font-size: 30px !important;
}

.dg-content-footer {
  background-color: red !important;
}
</style>
