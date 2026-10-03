<template>
    <div class="row">
        <div class="col-md-12">
                <form class="row g-3" @submit.prevent="onSubmit">
                    <div class="col-md-12">
                        <label for="name">اﻻسم</label>
                        <input type="text" class="form-control"   :class="[
              'form-control',
              { 'is-invalid': 'name' in errors },
            ]" name="name" id="name"
                                    placeholder="اﻻسم" v-model="user.name">
                        <span v-if="'name' in errors" class="invalid-feedback">
                            {{ displayValidationError(errors, "name") }}
                        </span>
                    </div>
                    <div class="col-md-12">
                        <label for="display-name">البريد الألكتروني</label>
                        <input type="text" class="form-control"   :class="[
              'form-control',
              { 'is-invalid': 'email' in errors },
            ]" name="email" id="email"
                                    placeholder="اسم العرض" v-model="user.email">
                        <span v-if="'email' in errors" class="invalid-feedback">
                            {{ displayValidationError(errors, "email") }}
                        </span>
                    </div>
                    <div class="col-md-12">
                        <EditButton/>
                    </div>
                </form>
        </div>
    </div>
</template>

<script setup>
    import {defineComponent, reactive, computed, onMounted} from 'vue'
    import {useUserStore} from "@/stores";
    import { displayValidationError } from "@/helpers/displayValidationError";
    import EditButton from "@/components/bootstrap/EditButton";

    defineOptions({
        name: 'UserEdit'
    })

    const props = defineProps({
        id: {
            type: String,
        },
    })

    const userStore = useUserStore()

    const user = computed(() => {
        return userStore.user
    })

    const errors = computed(() => {
        return userStore.errors
    })

    const onSubmit = async () => {
        userStore.userUpdate(props.id, user.value)
    }
    onMounted(() => {
        console.log(props.id)
        userStore.userShow(props.id)
    })

</script>

<style scoped>
</style>
