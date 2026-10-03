<template>
    <swiper
      :modules="modules"
      :slides-per-view="1"
      :space-between="30"
      :loop="true"
      :pagination="{ clickable: true }"
      :navigation="true"
      :autoplay="{ delay: 4000, disableOnInteraction: false }"
      class="swiper-wrapper"
    >
      <!-- Individual Slides -->
      <swiper-slide v-for="(image, index) in images" :key="index" class="swiper-slide">
        <img :src="image" :alt="image" class="img-fluid" width="650" />
      </swiper-slide>
    </swiper>
</template>

<script>
// Import Swiper Vue components
import { Swiper, SwiperSlide } from "swiper/vue";

// Import Swiper core styles
import "swiper/css";

// Import styles for specific modules used
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/autoplay";

// Import required modules from the core package
import { Navigation, Pagination, Autoplay } from "swiper/modules";

import { defineComponent, onMounted, ref } from "vue";

export default defineComponent({
  components: {
    Swiper,
    SwiperSlide,
  },
  setup() {
    // Array of mock image objects
    const images = ref([]);
    onMounted(() => {
      const modules = import.meta.glob(
        "@/assets/images/swiper/*.{png,jpg,jpeg,svg}",
        {
          eager: true,
        },
      );
      images.value = Object.values(modules).map((mod) => mod.default);
    });
    return {
      images,
      modules: [Navigation, Pagination, Autoplay],
    };
  },
});
</script>

<style scoped>
.swiper {
  --swiper-theme-color: #42b883; /* Vue Green */
  --swiper-navigation-size: 28px;
}
</style>
