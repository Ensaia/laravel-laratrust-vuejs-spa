<template>
    <div class="row">
        <div class="col-md-2 col-sm-12">
            <div class="info-box">
                  <span class="info-box-icon text-bg-dark shadow-sm">
                    <font-awesome-icon :icon="['fas', 'users']"/>
                  </span>
                <div class="info-box-content">
                    <span class="info-box-text">المستخدمون</span>
                    <span class="info-box-number">{{ dashboardStore.usersCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-12">
            <div class="info-box">
                  <span class="info-box-icon text-bg-dark shadow-sm">
                    <font-awesome-icon :icon="['fas', 'user-gear']"/>
                  </span>
                <div class="info-box-content">
                    <span class="info-box-text">الأدوار</span>
                    <span class="info-box-number">{{ dashboardStore.rolesCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-12">
            <div class="info-box">
                  <span class="info-box-icon text-bg-dark shadow-sm">
                    <font-awesome-icon :icon="['fas', 'user-lock']"/>
                  </span>
                <div class="info-box-content">
                    <span class="info-box-text">الصلاحيات</span>
                    <span class="info-box-number">{{ dashboardStore.permissionsCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-12">
            <div class="info-box">
                  <span class="info-box-icon text-bg-dark shadow-sm">
                    <font-awesome-icon :icon="['fas', 'book']"/>
                  </span>
                <div class="info-box-content">
                    <span class="info-box-text">المنشورات</span>
                    <span class="info-box-number">{{ dashboardStore.postsCount }}</span>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
    import {onMounted} from "vue";
    import {hijriDate} from "@/libs/hijriDate";

    defineOptions({
        name: "DashboardIndex"
    })
    import {useDashboardStore} from "@/stores";

    const dashboardStore = useDashboardStore()
    onMounted(() => {
        dashboardStore.getDataCount()
    })
</script>
