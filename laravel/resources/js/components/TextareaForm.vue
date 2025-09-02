<script setup lang="ts">
import { ref } from "vue";
import Plus from "./svgs/PlusSvg.vue";

const content = ref("");
</script>

<template>
  <div
    class="component-root bg-white shadow-lg border border-solid border-orange-100 max-w-2xl w-[96%] p-6 rounded-xl"
  >
    <div class="flex items-center gap-3">
      <Plus class="text-primary-500" />
      <p class="font-medium text-lg">新しいメモ</p>
    </div>
    <form action="">
      <textarea
        name="content"
        id="content"
        rows="4"
        v-model="content"
        placeholder="メモを入力してください... &#10; （Enterで保存、Shift+Enterで改行）"
        class="resize-none w-full leading-[1.75rem] p-3 mt-4 border border-gray-300 rounded-md outline-sky-200"
      ></textarea>
      <button
        class="flex items-center justify-center gap-2 w-full bg-gradient-to-r from-orange-500 to-red-500 rounded-xl mt-4 p-3 disabled:cursor-not-allowed disabled:bg-gradient-to-r disabled:from-orange-200 disabled:to-red-200"
        :disabled="content.length === 0"
      >
        <Plus class="text-white" />
        <p class="text-white font-medium text-lg">メモを保存</p>
      </button>
    </form>
  </div>
</template>
