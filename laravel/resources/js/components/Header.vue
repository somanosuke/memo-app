<script setup lang="ts">
import Icon from "./svgs/DocumentSvg.vue";
</script>

<template>
  <div class="component-root border-b border-solid border-yellow-200 shadow-md bg-white w-full">
    <div class="text pt-8 p-6">
      <div class="upper flex justify-center items-center gap-3">
        <Icon class="w-8 text-primary-500" />
        <h1
          class="text-3xl font-bold bg-gradient-to-r from-red-500 from- to-orange-500 to- bg-clip-text text-transparent"
        >
          かんたんメモ
        </h1>
      </div>
      <div class="lower text-center text-gray-600 text-sm mt-2">
        <p>思いついたことをサッと記録しよう</p>
      </div>
    </div>
  </div>
</template>
