<template>
  <div class="row mt-3">
    <div class="col-md-12">
      <router-link :to="{ name: 'postCreate' }" class="btn btn-dark">
        <span class="p-2">إضافة منشور</span>
        <span><font-awesome-icon :icon="['fas', 'square-plus']" /></span>
      </router-link>
    </div>
  </div>
  <div class="row mt-3" v-if="isPostsObjectEmpty">
    <div class="col-md-12">
      <AlertMessage
        variant="info"
        message="لا توجد أي منشورات"
        icon="circle-info"
      />
    </div>
  </div>
  <div class="row mt-3" v-else>
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="text-center">
            <tr>
              <th>#</th>
              <th>العنوان</th>
              <th>المحتوى</th>
              <th colspan="2">العمليات</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr v-for="(post, index) in posts" :key="post.id">
              <td>{{ index + 1 }}</td>
              <td>{{ post.title }}</td>
              <td>{{ post.content }}</td>
              <td>
                <router-link
                  :to="{
                    name: 'postEdit',
                    params: { id: post.id },
                  }"
                >
                  <font-awesome-icon
                    :icon="['fas', 'fa-edit']"
                    class="text-dark"
                    size="lg"
                  />
                </router-link>
              </td>
              <td>
                <a href="javascript:void(0);" @click="postDelete(post.id)">
                  <font-awesome-icon
                    :icon="['fas', 'fa-trash']"
                    class="text-dark"
                    size="lg"
                  />
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import AlertMessage from "@/components/bootstrap/AlertMessage";
import { ref, onMounted, computed, inject } from "vue";
import { usePostStore } from "@/stores";
defineOptions({ name: "PostsIndex" });
const swal = inject("$swal");

const postStore = usePostStore();

const posts = computed(() => {
  return postStore.posts;
});

const isPostsObjectEmpty = computed(() => {
  return postStore.posts.length === 0 ? true : false;
});

onMounted(() => {
  postStore.postsIndex();
});

const postDelete = async (post_id) => {
  swal({
    title: "هل أنت متأكد ؟",
    text: "سيتم حذف جميع البيانات وﻻ يمكن استرجاعها !!!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#4CAF50",
    cancelButtonColor: "#f44336",
    confirmButtonText: "حذف",
    cancelButtonText: "إلغاء",
  }).then((result) => {
    if (result.isConfirmed) {
      postStore.postDelete(post_id);
    }
  });
};
</script>

<style scoped></style>
