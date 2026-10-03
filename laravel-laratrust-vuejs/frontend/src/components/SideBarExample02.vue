<template>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar Menu Wrapper -->
        <div
                class="bg-dark text-white border-end transition-all"
                :class="isCollapsed ? 'collapsed-sidebar' : 'expanded-sidebar'"
                id="sidebar-wrapper"
        >
            <div class="sidebar-heading border-bottom p-3 fs-5 fw-bold">My App</div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white p-3 border-0">
                    <i class="bi bi-house-door me-2"></i> Dashboard
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white p-3 border-0">
                    <i class="bi bi-person me-2"></i> Profile
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white p-3 border-0">
                    <i class="bi bi-gear me-2"></i> Settings
                </a>
            </div>
        </div>

        <!-- Page Content Wrapper -->
        <div id="page-content-wrapper" class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom p-3">
                <button class="btn btn-primary" @click="toggleSidebar">
                    <i class="bi bi-list"></i> Menu
                </button>
            </nav>
            <div class="container-fluid p-4">
                <h1>Main Content Area</h1>
                <p>Your dashboard content goes here.</p>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue'

    // Reactive state to handle sidebar visibility
    const isCollapsed = ref(false)

    const toggleSidebar = () => {
        isCollapsed.value = !isCollapsed.value
    }
</script>

<style scoped>
    /* Smooth transition effects */
    .transition-all {
        transition: all 0.3s ease;
    }
    .expanded-sidebar {
        width: 250px;
        min-width: 250px;
    }
    .collapsed-sidebar {
        width: 0;
        min-width: 0;
        overflow: hidden;
    }
</style>
