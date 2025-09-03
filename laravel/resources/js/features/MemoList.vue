<script lang="ts" setup>
import MemoCard from "@/components/MemoCard.vue";
import MemoIcon from "../components/svgs/DocumentSvg.vue";
import { computed } from "vue";

interface Memo {
  id: number;
  content: string;
  timestamp: string;
} // defineProps に型だけ指定する
const props = defineProps<{ memos: Memo[] }>();

const reversedMemos = computed(() => {
  return props.memos.slice().reverse();
});
</script>

<template>
  <div class="component-root flex flex-col gap-4 max-w-2xl w-[96%]">
    <div class="title flex justify-between">
      <div class="text flex gap-2">
        <MemoIcon class="w-6" />
        <p class="font-medium text-xl">保存されたメモ</p>
      </div>
      <div class="text-sm number-chip text-gray-700 rounded-full bg-orange-200 pt-1 pb-1 pr-3 pl-3">
        {{ reversedMemos.length }}件
      </div>
    </div>
    <MemoCard
      v-for="memo in reversedMemos"
      :key="memo.id"
      :content="memo.content"
      :timestamp="memo.timestamp"
    />
  </div>
</template>
