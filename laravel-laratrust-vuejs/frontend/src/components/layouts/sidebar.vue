<template>
  <div class="d-flex wrapper">
    <!-- Sidebar -->
    <nav
      id="sidebar"
      :class="['bg-dark', 'text-white', 'p-3', { collapsed: isCollapsed }]"
    >
      <!-- Sidebar Header -->
      <div
        class="sidebar-header d-flex align-items-center justify-content-between mb-4"
      >
        <span v-if="!isCollapsed" class="fs-5 fw-bold">MyApp</span>
        <button
          @click="toggleSidebar"
          class="btn btn-sm btn-outline-light border-0"
        >
          <i
            :class="
              isCollapsed
                ? 'bi bi-text-indent-left fs-4'
                : 'bi bi-text-indent-right fs-4'
            "
          ></i>
        </button>
      </div>

      <!-- Navigation Links -->
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-2">
          <a
            href="#"
            class="nav-link active text-white d-flex align-items-center gap-2"
          >
            <i class="bi bi-house-door fs-5"></i>
            <span v-if="!isCollapsed">Home</span>
          </a>
        </li>
        <li class="nav-item mb-2">
          <a
            href="#"
            class="nav-link text-white d-flex align-items-center gap-2 opacity-75"
          >
            <i class="bi bi-speedometer2 fs-5"></i>
            <span v-if="!isCollapsed">Dashboard</span>
          </a>
        </li>
        <li class="nav-item mb-2">
          <a
            href="#"
            class="nav-link text-white d-flex align-items-center gap-2 opacity-75"
          >
            <i class="bi bi-gear fs-5"></i>
            <span v-if="!isCollapsed">Settings</span>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Main Content Area -->
    <div class="main-content flex-grow-1 p-4">
      <h2>Main Content Window</h2>
      <p>
        <router-view></router-view>
      </p>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

// Toggle state management
const isCollapsed = ref(false);

const toggleSidebar = () => {
  isCollapsed.value = !isCollapsed.value;
};
</script>

<style scoped>
.wrapper {
  min-height: 100vh;
}

/* Base sidebar styles and fluid transitions */
#sidebar {
  width: 250px;
  transition: width 0.3s ease-in-out;
}

/* Collapsed sidebar layout modifying width only */
#sidebar.collapsed {
  width: 70px;
  text-align: center;
}

.nav-link {
  transition: all 0.2s ease;
}

.nav-link:hover {
  background-color: rgba(255, 255, 255, 0.1);
  opacity: 1 !important;
}
</style>
