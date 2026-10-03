<template>
    <CRow class="justify-content-center">
        <CCol>
            <form class="row g-3">
                <div class="search-container">
                    <input class="form-control form-control-lg search-input" type="search"
                           placeholder="البحث عن المستخدمين"
                           aria-label="Search" v-model="formData.keyword"
                           @keyup="userSearch"
                    >
                    <font-awesome-icon :icon="['fas', 'magnifying-glass']" size="lg"
                                       class="search-icon"></font-awesome-icon>
                </div>
            </form>
        </CCol>
    </CRow>
    <CRow class="mt-4" v-if="users.length !== 0">
        <CCol>
            <vue3-confirm-dialog/>
            <alert></alert>
            <Transition name="fade">
                <CTable bordered responsive
                        style="--animate-duration: 0.3s; --animate-delay: 150; --animate-direction: reverse;">
                    <CTableHead class="text-center">
                        <CTableRow>
                            <CTableHeaderCell scope="col">#</CTableHeaderCell>
                            <CTableHeaderCell scope="col">اسم المستخدم</CTableHeaderCell>
                            <CTableHeaderCell scope="col">البريد اﻷلكتروني</CTableHeaderCell>
                            <CTableHeaderCell scope="col">حالة الحساب</CTableHeaderCell>
                            <CTableHeaderCell scope="col">اﻷدوار</CTableHeaderCell>
                            <CTableHeaderCell scope="col">اﻷدوار الحالية</CTableHeaderCell>
                            <CTableHeaderCell scope="col">اﻷذونات الحالية</CTableHeaderCell>
                            <CTableHeaderCell scope="col">اﻷذونات</CTableHeaderCell>
                            <CTableHeaderCell scope="col" colspan="2">العمليات</CTableHeaderCell>
                        </CTableRow>
                    </CTableHead>
                    <CTableBody class="text-center ">
                        <CTableRow v-for="(user, index) in users.data" :key="user.id">
                            <CTableHeaderCell>{{ index + 1 }}</CTableHeaderCell>
                            <CTableHeaderCell>{{ user.name }}</CTableHeaderCell>
                            <CTableHeaderCell>{{ user.email }}</CTableHeaderCell>
                            <CTableHeaderCell>
                                <CBadge color="dark" v-if="user.isEmailVerified === true" class="fs-6">
                                    الحساب مفعل
                                </CBadge>
                                <CBadge color="dark" class="fs-6" v-else>
                                    الحساب غير مفعل
                                </CBadge>
                            </CTableHeaderCell>
                            <CTableHeaderCell>
                                <router-link :to="{name : 'userRoles' , params:{id : user.id}}">
                                    <ul class="list-inline ">
                                        <li class="list-inline-item">
                                            <font-awesome-icon :icon="['fas','edit']" size="lg"
                                                               class="text-dark"></font-awesome-icon>
                                        </li>
                                        <li class="list-inline-item">|</li>
                                        <li class="list-inline-item">
                                            <font-awesome-icon :icon="['fas','plus-square']" size="lg"
                                                               class="text-dark"></font-awesome-icon>
                                        </li>
                                    </ul>
                                </router-link>
                            </CTableHeaderCell>
                            <CTableHeaderCell>
                                <CBadge color="dark" v-if="user.roles != 0" v-for="role in user.roles" class="fs-6 m-1">
                                    {{ role.name }}
                                </CBadge>
                                <CBadge color="dark" class="fs-6" v-else>ﻻ توجد أدوار حاليا</CBadge>
                            </CTableHeaderCell>
                            <CTableHeaderCell>
                                <CBadge color="dark" v-if="user.permissions != 0" v-for="permission in user.permissions"
                                        class="fs-6 m-1">{{
                                    permission.name }}
                                </CBadge>
                                <CBadge color="dark" class="fs-6" v-else>ﻻ توجد أذونات حاليا</CBadge>
                            </CTableHeaderCell>
                            <CTableHeaderCell>
                                <router-link :to="{name : 'userPermissions' , params : { id : user.id}}">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <font-awesome-icon :icon="['fas','edit']" size="lg"
                                                               class="text-dark"></font-awesome-icon>
                                        </li>
                                        <li class="list-inline-item">|</li>
                                        <li class="list-inline-item">
                                            <font-awesome-icon :icon="['fas','plus-square']" size="lg"
                                                               class="text-dark"></font-awesome-icon>
                                        </li>
                                    </ul>
                                </router-link>
                            </CTableHeaderCell>
                            <CTableHeaderCell>
                                <router-link :to="{name : 'userShow' , params : { id : user.id}}">
                                    <font-awesome-icon :icon="['fas' , 'fa-edit']" size="lg"
                                                       class="text-dark"></font-awesome-icon>
                                </router-link>
                            </CTableHeaderCell>
                            <CTableHeaderCell>
                                <a href="javascript:void(0);" @click="userDelete(user.id)">
                                    <font-awesome-icon :icon="['fas' , 'fa-trash']" size="lg"
                                                       class="text-dark mt-1"></font-awesome-icon>
                                </a>
                            </CTableHeaderCell>
                        </CTableRow>
                    </CTableBody>
                    <CTableHead>
                        <CTableRow>
                            <CTableDataCell scope="row" colspan="10">
                                <bootstrap5-pagination :data="users" @pagination-change-page="searchStore.userSearch">
                                    <span slot="prev-nav">السابق</span>
                                    <span slot="next-nav">التالي</span>
                                </bootstrap5-pagination>
                            </CTableDataCell>
                        </CTableRow>
                    </CTableHead>
                </CTable>
            </Transition>
        </CCol>
    </CRow>
    <CRow class="mt-3" v-else>
        <CCol>
            <CAlert color="dark">
                <h6>No Data</h6>
            </CAlert>
        </CCol>
    </CRow>
</template>

<script>
    import {
        defineComponent, inject, reactive, watch, ref, computed
    } from 'vue'
    import {useUserStore} from '@/stores/user'
    import {useSearchStore} from '@/stores/search'
    import axios from 'axios'
    import {Bootstrap5Pagination} from 'laravel-vue-pagination'
    export default defineComponent({
        name: 'UserSearch',
        components: {
            Bootstrap5Pagination
        },
        props: {},
        setup(props, context) {

            // const users = ref({})
            let page = ref(1)
            const userStore = useUserStore()
            const searchStore = useSearchStore()
            const confirm = inject("vue3-confirm-dialog-box")
            watch((after, before) => {

            })
            const formData = reactive({
                keyword: '',
                message: '',
            });
            const users = computed(()=>{
                return searchStore.users
            })
            const userSearch = async (event,page) => {
                await searchStore.userSearch(page)
            }
            const userDelete = async (user_id) => {
                confirm(
                    {
                        title: 'تأكيد الحدث',
                        message: 'هل أنت متأكد ؟ سيتم حذف جميع البيانات وﻻ يمكن استرجاعها',
                        disableKeys: false,
                        auth: false,
                        button: {
                            no: 'ﻻ',
                            yes: 'نعم'
                        },
                        callback: confirm => {
                            if (confirm) {
                                userStore.userDelete(user_id)
                            }
                        }
                    }
                )
            }
            return {
                formData,
                users,
                searchStore,
                userSearch,
                userDelete
            }
        },
    })
</script>

<style scoped>
    .search-container {
        position: relative;
    }

    .search-input {
        height: 50px;
        border-radius: 5px;
        padding-left: 35px;
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .search-icon {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #888;
    }
</style>
