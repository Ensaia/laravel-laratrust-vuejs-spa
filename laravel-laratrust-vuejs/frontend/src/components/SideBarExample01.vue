<template>
<!--
npm install vue-sidebar-menu@next --save
import VueSidebarMenu from 'vue-sidebar-menu'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
app.use(VueSidebarMenu)
-->
    <div id="app-layout" :class="[{ 'collapsed': isCollapsed }]">
        <!-- Sidebar Menu Component -->
        <sidebar-menu
                :menu="menuItems"
                v-model:collapsed="isCollapsed"
                theme="white-theme"
                @item-click="onItemClick"
        />

        <!-- Main Application Content Area -->
        <main class="main-content">
            <router-view />
        </main>
    </div>
</template>

<script setup>
    import { ref } from 'vue'

    // Tracks sidebar open/collapsed state
    const isCollapsed = ref(false)

    // Menu items structure configuration
    const menuItems = ref([
        {
            header: 'Main Navigation',
            hiddenOnCollapse: true
        },
        {
            href: '/',
            title: 'Dashboard',
            icon: 'fa fa-user' // Requires FontAwesome or similar icon utility class
        },
        {
            href: '/charts',
            title: 'Analytics',
            icon: 'fa fa-chart-area',
            // Dropdown submenu child elements
            child: [
                {
                    href: '/charts/subpage',
                    title: 'Sub Link'
                }
            ]
        }
    ])

    // Event callback logic
    const onItemClick = (event, item) => {
        console.log("Navigated to:", item.title)
    }
</script>

<style>
    body {
        margin: 0;
        font-family: sans-serif;
    }

    #app-layout {
        padding-left: 290px; /* Matches default expanded sidebar width */
        transition: padding-left 0.3s ease;
    }

    #app-layout.collapsed {
        padding-left: 65px; /* Matches default collapsed sidebar width */
    }

    .main-content {
        padding: 20px;
    }
</style>
