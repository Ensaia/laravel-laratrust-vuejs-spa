<template>
  <BackOneRecord />
  <div class="row mt-3">
    <div class="col-md-12">
      <form class="form row g-3" @submit.prevent="onFormSubmit">
        <div class="col-md-12">
          <label for="name" class="form-label">العنوان</label>
          <input
            type="text"
            name="title"
            id="title"
            :class="['form-control', { 'is-invalid': 'title' in errors }]"
            placeholder="العنوان"
            v-model="formData.title"
          />
          <div v-if="'title' in errors" class="invalid-feedback">
            {{ displayValidationError(errors, "title") }}
          </div>
        </div>
        <div class="col-md-12">
          <label for="content" class="form-label">المحتوى</label>
          <textarea
            name="content"
            id="content"
            rows="3"
            v-model="formData.content"
            :class="['form-control', { 'is-invalid': 'content' in errors }]"
            placeholder="المحتوى"
          ></textarea>
          <div v-if="'content' in errors" class="invalid-feedback">
            {{ displayValidationError(errors, "content") }}
          </div>
        </div>
        <div class="col-md-12">
          <CreateButton />
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, computed } from "vue";
import { usePostStore } from "@/stores";
import { displayValidationError } from "@/helpers/displayValidationError";
import BackOneRecord from "@/components/bootstrap/BackOneRecord";
import CreateButton from "@/components/bootstrap/CreateButton";
defineOptions({ name: "PostCreate" });

const postStore = usePostStore();

const formData = reactive({
  title: "",
  content: "",
});
const errors = computed(() => {
  return postStore.errors;
});
const onFormSubmit = async () => {
  await postStore.postCreate(formData);
};
</script>

<style scoped></style>
