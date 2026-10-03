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
            <li class="nav-item" v-for="link in links" :key="link.href">
              <a class="nav-link" aria-current="page" :href="link.href">
                <span class="navbar-text">{{ link.title }}</span>
                <span class="m-1"
                  ><font-awesome-icon
                    :icon="['fas', link.icon]"
                  /></span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav d-flex">
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0);" id="dark-mode-toggle" @click="toggleDarkMode">
                <span><font-awesome-icon :icon="['fas', 'sun']" /></span>
                <span>|</span>
                <span><font-awesome-icon :icon="['fas', 'moon']" /></span>
              </a>
            </li>
            <li class="nav-item" v-if="authStore.isAuthenticated">
              <a class="nav-link" aria-disabled="true">
                <span class="navbar-text">
                  {{ authStore.user.name }}
                </span>
                <span class="m-1"
                  ><font-awesome-icon
                    :icon="['fas', 'user-circle']"
                  /></span>
              </a>
            </li>
            <li class="nav-item" v-if="!authStore.isAuthenticated">
              <a class="nav-link" aria-disabled="true" href="/login">
                <span class="navbar-text">تسجيل الدخول</span>
                <span class="m-1"
                  ><font-awesome-icon
                    :icon="['fas', 'right-to-bracket']"
                  /></span>
              </a>
            </li>
            <li class="nav-item" v-if="authStore.isAuthenticated">
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
                  /></span>
              </a>
            </li>
            <li class="nav-item" v-if="!authStore.isAuthenticated">
              <a class="nav-link" aria-disabled="true" href="/register">
                <span class="navbar-text">إنشاء حساب</span>
                <span class="m-1"
                  ><font-awesome-icon
                    :icon="['fas', 'user-plus']"
                  /></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script setup>
import { useAuthStore } from "@/stores/auth";
import { storeToRefs } from "pinia";
defineOptions({ name: "Navbar" });

import {onMounted, ref} from "vue";

const authStore = useAuthStore();

const { name, email } = storeToRefs(authStore);
const handleLogout = async () => {
  await authStore.logout();
};
const links = ref([
  {
    href: "/",
    title: "الرئيسية",
    icon: "home",
  },
  {
    href: "/dashboard",
    title: "لوحة التحكم",
    icon: "gauge-high",
  },
  {
    href: "/dashboard/users",
    title: "المستخدمون",
    icon: "users",
  },
  {
    href: "/dashboard/roles",
    title: "اﻷدوار",
    icon: "user-gear",
  },
  {
    href: "/dashboard/permissions",
    title: "اﻷذونات",
    icon: "user-lock",
  },
  {
    href: "/dashboard/posts",
    title: "المنشورات",
    icon: "book",
  },
]);
const isDark = ref(localStorage.getItem('theme') === 'dark')

const toggleDarkMode = () => {
  isDark.value = !isDark.value
  const themeValue = isDark.value ? 'dark' : 'light'

  // Apply to root for Bootstrap 5.3+ / AdminLTE 4 compatibility
  document.documentElement.setAttribute('data-bs-theme', themeValue)
  localStorage.setItem('theme', themeValue)
}
// Persist choice on page reload
onMounted(() => {
  // Initialize current preference on load
  const savedTheme = localStorage.getItem('theme') || 'light'
  document.documentElement.setAttribute('data-bs-theme', savedTheme)
})
</script>

<style scoped></style>
