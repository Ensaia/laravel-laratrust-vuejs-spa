<template>
  <!-- Sidebar -->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
      <div class="sidebar-brand">
        <a href="#" class="brand-link">
          <span class="brand-text fw-light">My Dashboard</span>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <nav class="mt-2">
          <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
            <li class="nav-header">القائمة الرئيسية</li>
            <li class="nav-item"
                v-for="link in links" :key="link.href">
              <a class="nav-link d-flex justify-content-between" aria-current="page" :href="link.href">
               <span>{{ link.title }}</span>
                <span class=""
                ><font-awesome-icon :icon="['fas', link.icon]"/>
                </span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
</template>
<script setup>
import { ref } from 'vue'

defineOptions({ name: "AppSidebar" });
// Define the nav items
const navItems = ref(['Home', 'About', 'Services', 'Contact'])

// Track the active item by index or name
const activeItem = ref('')

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
    title: "الصلاحيات",
    icon: "user-lock",
  },
  {
    href: "/dashboard/posts",
    title: "المنشورات",
    icon: "book",
  },
]);
</script>