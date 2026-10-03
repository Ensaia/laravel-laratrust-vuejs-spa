<template>
  <div class="row g-3">
    <!-- right side -->
    <div class="col-md-6">
      <div><Swiper /></div>
      <div class="card mt-3">col md 8</div>
    </div>
    <!-- left side -->
    <div class="col-md-6">
      <div class="">
       <MiraathRadio />
      </div>
      <div class="card mt-2">
      <div class="card-body text-center">
        <span class="card-text fw-semibold">{{ hijriDate.outputGregorianDate }} - {{ hijriDate.outputHijriDate }}</span>
      </div>
      </div>
        <div class="card mt-2 g-3">
          <div class="card-body">
            <div class="card-title">
              <span class="card-text fw-semibold"> مواقيت الصلاة لمدينة {{ homeStore.cityName }} </span>
            </div>
            <table class="table table-borderless">
              <thead class="text-center">
              <tr>
                <th>الفجر</th>
                <th>الشروق</th>
                <th>الظهر</th>
                <th>العصر</th>
                <th>المغرب</th>
                <th>العشاء</th>
              </tr>
              </thead>
              <tbody class="text-center">
              <tr v-for="prayer_time in homeStore.prayerTimes" :key="prayer_time.id">
                <td> {{ prayer_time.fajr }}</td>
                <td> {{ prayer_time.shoruq }}</td>
                <td> {{ prayer_time.dohr }}</td>
                <td> {{ prayer_time.asr }}</td>
                <td> {{ prayer_time.maghrib }}</td>
                <td> {{ prayer_time.isha }}</td>
              </tr>
              </tbody>
            </table>

          </div>
        </div>
      <div class="mt-3 g-2">
        <p class="fw-semibold">جديد المنشورات</p>
      </div>
      <div class="card mt-2 g-3" v-for="post in homeStore.latestPosts" :key="post.id">
        <div class="card-body">
          <div>
            <p class="card-text">{{ post.title }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
defineOptions({ name : 'HomeIndex' })
import { onMounted, ref } from "vue";
import Swiper from "@/components/ui/Swiper";
import MiraathRadio from "@/components/ui/MiraathRadio";
import { hijriDate } from "@/libs/hijriDate";
import { useHomeStore } from "@/stores";
const homeStore = useHomeStore()

const dateOutput = ref(`${hijriDate.outputGregorianDate} - ${hijriDate.outputHijriDate}`)

  onMounted(() => {
    hijriDate.today().toString()
    homeStore.getLatestPosts()
    homeStore.getPrayerTimes()
  })
</script>
