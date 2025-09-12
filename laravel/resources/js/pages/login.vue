<script lang="ts" setup>
import Header from "../components/Header.vue";
import DarkModeToggle from "../components/darkModeToggle.vue";
import LoginSignup from "../features/LoginSigninCard.vue";
import DarkToggle from "@/components/darkModeToggle.vue";
</script>
<template>
  <div
    class="page-root bg-gradient-to-r from-lightPrimary to-lightSecondary pb-20 min-h-screen flex flex-col items-center gap-8 [&_*]:transition-colors [&_*]:duration-300"
  >
    <Header />
    <div class="max-w-2xl w-[96%] flex justify-end">
      <DarkModeToggle />
    </div>
    <LoginSignup />
  </div>
</template>
