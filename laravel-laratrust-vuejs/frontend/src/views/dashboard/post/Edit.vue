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
            v-model="post.title"
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
            v-model="post.content"
            :class="['form-control', { 'is-invalid': 'content' in errors }]"
            placeholder="المحتوى"
          ></textarea>
          <div v-if="'content' in errors" class="invalid-feedback">
            {{ displayValidationError(errors, "content") }}
          </div>
        </div>
        <div class="col-md-12">
          <EditButton />
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, computed, onMounted } from "vue";
import { usePostStore } from "@/stores";
import { displayValidationError } from "@/helpers/displayValidationError";
import BackOneRecord from "@/components/bootstrap/BackOneRecord";
import EditButton from "@/components/bootstrap/EditButton";
defineOptions({ name: "PostEdit" });

const postStore = usePostStore();

const props = defineProps({
  id: {
    type: String,
  },
});

const post = computed(() => {
  return postStore.post;
});
const errors = computed(() => {
  return postStore.errors;
});
onMounted(() => {
  postStore.postShow(props.id);
});
const onFormSubmit = async () => {
  await postStore.postUpdate(props.id, post.value);
};
</script>

<style scoped></style>
