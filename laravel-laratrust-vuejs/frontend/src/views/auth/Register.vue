<template>
  <div class="col-md-12 py-5">
<!--    <div v-if="errorsMessages" class="alert alert-danger" role="alert">-->
<!--      <strong>خطأ!</strong> {{ errorsMessages }} <strong>خطأ!</strong>-->
<!--      {{ errors }}-->
<!--    </div>-->
    <div class="text-center">
      <span class="fs-3 fw-semibold">إنشاء حساب</span>
    </div>
    <form id="register-form" @submit.prevent="onFormSubmit">
      <div class="mb-3 mt-3">
        <label for="name" class="form-label">اسم المستخدم</label>
        <input
          type="text"
          id="name"
          :class="[
            'form-control',
            { 'is-invalid': 'name' in errors },
          ]"
          placeholder="اسم المستخدم"
          name="name"
          v-model="formData.name"
          ref="autofocus"
          :disabled="processing"
          autocomplete="name"
        />
        <div v-if="'name' in errors" class="invalid-feedback">
          {{ displayValidationError(errors, "name") }}
        </div>
      </div>
      <div class="mb-3 mt-3">
        <label for="email" class="form-label">البريد الإلكتروني</label>
        <input
          type="email"
          id="email"
          :class="[
            'form-control',
            { 'is-invalid': 'email' in errors },
          ]"
          placeholder="البريد الإلكتروني"
          name="email"
          v-model="formData.email"
          ref="autofocus"
          :disabled="processing"
          autocomplete="email"
        />
        <div v-if="'email' in errors" class="invalid-feedback">
          {{ displayValidationError(errors, "email") }}
        </div>
      </div>
      <div class="mb-3 mt-3">
        <div class="row g-3">
          <div class="col-md-6">
            <label for="email" class="form-label">كلمة المرور</label>
            <input
              type="password"
              id="password"
              :class="[
                'form-control',
                { 'is-invalid': 'password' in errors },
              ]"
              placeholder="كلمة المرور"
              name="password"
              v-model="formData.password"
              ref="autofocus"
              :disabled="processing"
            />
            <div v-if="'password' in errors" class="invalid-feedback">
              {{ displayValidationError(errors, "password") }}
            </div>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">تأكيد كلمة المرور</label>
            <input
              type="password"
              id="password-confirm"
              :class="[
                'form-control',
                { 'is-invalid': 'password_confirmation' in errors },
              ]"
              placeholder="تأكيد كلمة المرور"
              name="password-confirm"
              v-model="formData.passwordConfirm"
              ref="autofocus"
              :disabled="processing"
            />
            <div v-if="'password_confirmation' in errors" class="invalid-feedback">
              {{ displayValidationError(errors, "password_confirmation") }}
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3 mt-3 d-grid gap-2">
        <button
          type="submit"
          name="submit"
          class="btn btn-dark"
          :disabled="processing"
        >
          <span
            v-show="processing"
            class="spinner-border spinner-border-sm"
            role="status"
            aria-hidden="true"
          ></span>
          <span class="p-2">إنشاء حساب</span>
          <span
            ><font-awesome-icon :icon="['fas', 'user-plus']"></font-awesome-icon
          ></span>
        </button>
      </div>
    </form>
    <div class="d-flex justify-content-between">
      <div>
        <router-link :to="{ name: 'login' }" class="text-sm btn btn-dark">
          تسجيل الدخول
        </router-link>
      </div>
      <div>
        <router-link
          :to="{ name: 'forgotPassword' }"
          class="text-sm btn btn-dark"
        >
          هل نسيت كلمة المرور ؟
        </router-link>
      </div>
    </div>
  </div>
</template>
<script setup>
import { reactive, defineComponent, onMounted, computed, ref } from "vue";
import { useRouter } from "vue-router";
import router from "@/router";
import { useAuthStore } from "@/stores/auth";
import Swal from 'sweetalert2'
import { displayValidationError } from "@/helpers/displayValidationError";

defineOptions({
  name: "Register" })
    const processing = ref(false);
    const autofocus = ref(null);
    //const router = useRouter();
    const authStore = useAuthStore();
    onMounted(() => {
      autofocus.value.focus();
    });
    const errors = computed(() => {
      return authStore.registrationErrors;
    });
    const errorsMessages = computed(() => {
      return authStore.registrationErrorsMessages;
    });
    const formData = reactive({
      name: 'User6',
      email: 'user6@laravel.com',
      password: '123456789',
      passwordConfirm: '123456789',
    });

    const onFormSubmit = async () => {
      const payload = {
        name: formData.name,
        email: formData.email,
        password: formData.password,
        password_confirmation: formData.passwordConfirm,
      };
      try {
        processing.value = true;
        await authStore.register(payload);
        // await router.push({ name: "dashboard" });
      } catch (error) {
        setTimeout(() => {
          autofocus.value.focus();
          autofocus.value.select();
        }, 5);
        console.log(error.message);
      }
      processing.value = false;
      // console.log("Form submitted", payload);
      // await authStore
      //   .register(payload)
      //   .then((response) => {
      //     console.log("Registration Response:", response.status);
      //   })
      //   .catch((error) => {
      //     console.error("Registration Error:", error);
      //   });
    };

</script>
