<script setup lang="ts">
import Icon from "./svgs/DocumentSvg.vue";
</script>

<template>
  <div
    class="component-root border-b border-solid border-yellow-200 dark:border-teal-700 shadow-md bg-background w-full"
  >
    <div class="text pt-8 p-6">
      <div class="upper flex justify-center items-center gap-3">
        <Icon class="text-primary" :size="30" />
        <h1
          class="text-3xl font-bold bg-gradient-to-r from-primary from- to-secondary to- bg-clip-text text-transparent"
        >
          かんたんメモ
        </h1>
      </div>
      <div class="lower text-center text-subtext text-sm mt-2">
        <p>思いついたことをサッと記録しよう</p>
      </div>
    </div>
  </div>
</template>
