<script lang="ts" setup>
import Sun from "./svgs/SunSvg.vue";
import Moon from "./svgs/MoonSvg.vue";
import { ref } from "vue";

const isDark = ref(false);

function toggleDarkMode() {
  isDark.value = !isDark.value;
  document.documentElement.classList.toggle("dark", isDark.value);
}
</script>
<template>
  <div
    class="component-root bg-background border border-gray-300 w-[13%] h-8 px-3 py-1 rounded-xl cursor-pointer relative overflow-hidden"
    @click="toggleDarkMode"
  >
    <transition name="toggleButton">
      <div class="flex items-center gap-1 text-text absolute" v-if="!isDark">
        <Sun size="18" />
        <p class="select-none">Light</p>
      </div>
      <div class="flex items-center gap-1 text-text absolute" v-else>
        <Moon size="18" />
        <p class="select-none">Dark</p>
      </div>
    </transition>
  </div>
</template>
<style scoped>
.toggleButton-enter-active,
.toggleButton-leave-active {
  transition: all 0.25s ease-out;
}

.toggleButton-enter-from {
  opacity: 0;
  transform: translateY(20px);
}

.toggleButton-leave-to {
  opacity: 0;
  transform: translateY(-20px);
}
</style>
