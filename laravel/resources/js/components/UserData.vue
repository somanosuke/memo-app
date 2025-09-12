<script lang="ts" setup>
import { onMounted, ref } from "vue";
import axios from "axios";

const currentUser = ref("");
axios.defaults.headers.common["X-CSRF-TOKEN"] =
  document.querySelector('meta[name="csrf-token"]').content;

async function getCurrentUser() {
  const res = await axios.get("/getCurrentUser");
  currentUser.value = res.data;
}

onMounted(() => {
  getCurrentUser();
});
</script>

<template>
  <p class="text-text">
    <span class="font-bold text-lg">{{ currentUser.name }}</span
    >( @{{ currentUser.display_id }} )でログイン中
  </p>
</template>
