<script lang="ts" setup>
defineProps<{
  content: string;
  timestamp: string;
}>();
</script>

<template>
  <div
    class="component-root bg-white shadow-lg border border-solid border-orange-100 p-6 rounded-xl"
  >
    <p class="text-lg font-normal">{{ content }}</p>
    <p class="text-md font-light text-gray-500">{{ timestamp }}</p>
  </div>
</template>
