<template>
  <div class="app-wrapper">
    <AppNavbar />
    <AppSidebar />
    <!-- Main content -->
    <main class="app-main">
      <div class="app-content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/" class="link-dark">
                      <span>الرئيسية</span>
                      <span class="m-1"
                        ><font-awesome-icon :icon="['fas', 'home']"
                      /></span>
                    </a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    <a href="/dashboard" class="link-dark">
                      <span>لوحة التحكم</span>
                      <span class="m-1"
                        ><font-awesome-icon :icon="['fas', 'gauge-high']"
                      /></span>
                    </a>
                  </li>
                </ol>
              </nav>
            </div>
            <div class="col-md-4">
              <span class="fw-semibold">
                {{ hijriDate.outputGregorianDate }} -
                {{ hijriDate.outputHijriDate }}
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="app-content">
        <div class="container-fluid">
          <router-view />
        </div>
      </div>
    </main>
    <AppFooter />
  </div>
</template>

<script setup>
defineOptions({ name: "DashboardLayout" });
import { onMounted, onUnmounted, ref } from "vue";
import AppNavbar from "@/components/adminlte/AppNavbar";
import AppSidebar from "@/components/adminlte/AppSidebar";
import AppFooter from "@/components/adminlte/AppFooter";
import { hijriDate } from "@/libs/hijriDate";

onMounted(() => {
  hijriDate.today().toString();
  document.body.classList.add("layout-fixed", "sidebar-expand-lg", "bg-body-tertiary");
});
onUnmounted(() => {
  document.body.classList.remove("layout-fixed", "sidebar-expand-lg", "bg-body-tertiary");
});
</script>
<style scoped></style>
