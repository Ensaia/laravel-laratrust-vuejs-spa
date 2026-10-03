<template>
    <BackOneRecord />
    <div class="row mt-3" >
        <div class="col-md-12" v-if="errors">
            <AlertMessage variant="danger" :message="errors?.permission_id[0]" icon="triangle-exclamation" />
        </div>
    </div>
    <div class="row mt-3" >
        <div class="col-md-12" >
         إضافة إذن للمستخدم <span class="badge text-bg-dark fs-6">{{ user.name }}</span>
        </div>
    </div>
    <div class="row mt-3" >
        <div class="col-md-12" >
            <form @submit.prevent="onSubmit" class="row g-3">
                <div class="col-12">
                    <label for="permission-id" class="form-label">اﻷذونات</label>
                    <select class="form-select"  name="permission_id"
                                 v-model="formData.permission_id">
                        <option disabled selected>اختار إذن</option>
                        <option v-for="permission in permissions" :key="permission.id"
                                :value="permission.id">
                            {{ permission.name }}
                        </option>
                        <span class="form-text fs-6">لا يمكن تكرار الإذن الرجاء التأكد قبل الإضافة</span>
                    </select>
                </div>
                <div class="col-12">
                    <button class="btn btn-dark">
                        <span class="p-2">إضافة إذن</span>
                        <span><font-awesome-icon :icon="['fas','square-plus']"/></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-3" v-if="isUserPermissionsObjectEmpty">
        <div class="col-md-12" >
            <span class="fw-bold fs-5">لا توجد أي أدوار</span>
        </div>
    </div>
    <div class="mt-3" v-else>
        <div class="col-md-12" >
            <span class="fw-semibold fs-5">اﻷذونات الحالية</span>
            <ul class="nav" v-for="permission in user.permissions">
                <li class="nav-item">
                    <a class="nav-link">
                        <span class="badge text-bg-dark fw-semibold fs-6">
                            {{ permission.name }}
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
    import {
        defineComponent, computed, onMounted, reactive
    } from 'vue'
    import BackOneRecord from "@/components/bootstrap/BackOneRecord"
    import AlertMessage from "@/components/bootstrap/AlertMessage"
    import {usePermissionStore} from "@/stores/permission"
    import {useUserPermissionStore} from '@/stores/userPermission'
    import {useUserStore} from '@/stores/user'
    import {useRouter} from 'vue-router'


        defineOptions({name: 'UserPermissionCreate'})

        const props = defineProps({ id : { type : String} })

            const permissionStore = usePermissionStore()
            const userPermissionStore = useUserPermissionStore()
            const userStore = useUserStore()
            const router = useRouter()

            const formData = reactive({
                user_id: props.id,
                permission_id: ''
            })
            const user = computed(() => {
                return userStore.user
            })
            const permissions = computed(() => {
                return permissionStore.permissions
            })
            const errors = computed(() => {
                return userPermissionStore.errors
            })

            const isUserPermissionsObjectEmpty = computed(() => {
                return userStore.user?.permissions?.length === 0 ? true : false
            })
            const onSubmit = async () => {
                await userPermissionStore.userPermissionCreate(props.id, formData)
            }
            onMounted(() => {
                permissionStore.permissionsIndex()
                userStore.userShow(props.id)
            })

</script>

<style scoped>
</style>
