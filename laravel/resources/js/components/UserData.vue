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

async function handleLogout() {
  const res = await axios.post("/logout");
  window.location.reload();
  console.log(res.data);
}

onMounted(() => {
  getCurrentUser();
});
</script>

<template>
  <div class="component-root">
    <div class="status">
      <p class="text-text" v-if="Object.keys(currentUser).length !== 0">
        <span class="font-bold text-lg">{{ currentUser.name }}</span
        >( @{{ currentUser.display_id }} )でログイン中
      </p>
      <p v-else class="text-text">ログインしていません。</p>
    </div>
    <div class="buttons">
      <div
        v-if="Object.keys(currentUser).length !== 0"
        @click="handleLogout"
        class="text-text text-lg px-4 py-2 w-fit bg-background rounded-md text-center cursor-pointer shadow-md mt-2"
      >
        ログアウト
      </div>
      <div
        v-else
        class="text-text text-lg px-4 py-2 w-fit bg-background rounded-md text-center cursor-pointer shadow-md mt-2"
      >
        <a href="/login">ログイン/サインアップ</a>
      </div>
    </div>
  </div>
</template>
