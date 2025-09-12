<script lang="ts" setup>
import { onMounted, ref } from "vue";
import axios from "axios";

const currentUser = ref("");
axios.defaults.headers.common["X-CSRF-TOKEN"] =
  document.querySelector('meta[name="csrf-token"]').content;

async function getCurrentUser() {
  const res = await axios.get("/getCurrentUser");
  currentUser.value = res.data;
  console.log("currentUser", res.data);
}

onMounted(() => {
  getCurrentUser();
});
</script>

<template>
  <div class="component-root">
    <p class="text-text" v-if="Object.keys(currentUser).length !== 0">
      <span class="font-bold text-lg">{{ currentUser.name }}</span
      >( @{{ currentUser.display_id }} )でログイン中
    </p>
    <p v-else class="text-text">ログインしていません。</p>
  </div>
</template>
