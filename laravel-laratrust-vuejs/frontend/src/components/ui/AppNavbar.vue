<template>
  <div class="container py-4">
    <nav class="navbar navbar-expand-lg text-body-secondary border-bottom">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link
                class="nav-link active"
                aria-current="page"
                :to="{ name: 'dashboard' }"
              >
                <span class="navbar-text">لوحة التحكم</span>
                <span class="m-1"
                  ><font-awesome-icon
                    :icon="['fas', 'gauge-high']"
                  ></font-awesome-icon
                ></span>
              </router-link>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
          </ul>
          <ul class="navbar-nav d-flex">
            <li class="nav-item">
              <a class="nav-link" aria-disabled="true">
                {{ name }}
              </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                aria-disabled="true"
                href="javascript:void(0);"
                @click="handleLogout"
              >
                <span class="navbar-text">تسجيل الخروج</span>
                <span class="m-1"
                  ><font-awesome-icon
                    :icon="['fas', 'right-from-bracket']"
                  ></font-awesome-icon
                ></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
import { defineComponent, ref, computed, onMounted } from "vue";
import { storeToRefs } from "pinia";
import { useAuthStore } from "@/stores/auth";
export default defineComponent({
  name: "AppNavbar",
  components: {},
  setup(props, context) {
    const authStore = useAuthStore();
    const { name, email } = storeToRefs(authStore);
    const handleLogout = async () => {
      await authStore.logout();
    };
    return {
      name,
      email,
      handleLogout,
    };
  },
});
</script>

<style scoped>
.navbar a {
  color: #000000;
  font-size: 16px;
  /*font-weight: bold;*/
}
.navbar-nav > .active > a:hover,
.navbar-nav > li > a:hover,
.navbar-nav > li > a:focus {
  background-color: #efefef;
  color: #000000;
  /* font-size: 17px; */
  border-radius: 5px;
}
</style>
