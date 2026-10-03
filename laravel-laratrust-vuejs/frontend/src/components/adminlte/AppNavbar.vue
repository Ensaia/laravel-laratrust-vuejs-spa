<template>
<!-- Navbar -->
<nav class="app-header navbar navbar-expand bg-body">
  <!--begin::Container-->
  <div class="container-fluid">
    <!-- Start navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <spa><font-awesome-icon :icon="['fas','bars']" /></spa>
        </a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="/" class="nav-link">
            <span class="navbar-text">الرئيسية</span>
            <span class="m-1"><font-awesome-icon :icon="['fas','home']" /></span>
        </a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="/dashboard" class="nav-link">
            <span class="navbar-text">لوحة التحكم</span>
            <span class="m-1"><font-awesome-icon :icon="['fas','gauge-high']" /></span>
        </a>
      </li>
    </ul>
    <!-- End navbar links -->

    <ul class="navbar-nav ms-auto">
<!-- color mode -->
        <li class="nav-item dropdown">
            <a
                    class="nav-link"
                    href="#"
                    id="bd-theme"
                    aria-label="Toggle color scheme"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
            >
                <i class="bi bi-sun-fill" data-lte-theme-icon="light"></i>
                <i class="bi bi-moon-fill d-none" data-lte-theme-icon="dark"></i>
                <i class="bi bi-circle-half d-none" data-lte-theme-icon="auto"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme">
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                        <i class="bi bi-sun-fill me-2"></i>
                        Light
                        <i class="bi bi-check-lg ms-auto d-none"></i>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                        <i class="bi bi-moon-fill me-2"></i>
                        Dark
                        <i class="bi bi-check-lg ms-auto d-none"></i>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                        <i class="bi bi-circle-half me-2"></i>
                        Auto
                        <i class="bi bi-check-lg ms-auto d-none"></i>
                    </button>
                </li>
            </ul>
        </li>
<!-- color mode -->
        <li class="nav-item" v-if="authStore.isAuthenticated">
            <a class="nav-link" aria-disabled="true">
                <span class="navbar-text">
                  {{ authStore.user.name }}
                </span>
                <span class="m-1"
                ><font-awesome-icon
                        :icon="['fas', 'user-circle']"
                />
                </span>
            </a>
        </li>
        <li class="nav-item" v-if="!authStore.isAuthenticated">
            <a class="nav-link" aria-disabled="true" href="/login">
                <span class="navbar-text">تسجيل الدخول</span>
                <span class="m-1"
                ><font-awesome-icon
                        :icon="['fas', 'right-to-bracket']"
               />
                </span>
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
                />
                </span>
            </a>
        </li>
        <li class="nav-item" v-if="!authStore.isAuthenticated">
            <a class="nav-link" aria-disabled="true" href="/register">
                <span class="navbar-text">إنشاء حساب</span>
                <span class="m-1"
                ><font-awesome-icon
                        :icon="['fas', 'user-plus']"
                />
                </span>
            </a>
        </li>
    </ul>
  </div>
  <!--end::Container-->
</nav>
<!-- /.navbar -->
</template>

<script setup>

    import { useAuthStore } from "@/stores";
    import { storeToRefs } from "pinia";

    defineOptions({ name: "AppNavbar" });

    const authStore = useAuthStore();

    const { name, email } = storeToRefs(authStore);
    const handleLogout = async () => {
        await authStore.logout();
    };
</script>