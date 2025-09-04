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
        <MemoIcon class="w-7 text-primary-500" />
        <p class="font-medium text-xl">保存されたメモ</p>
      </div>
      <div class="text-sm number-chip text-gray-700 rounded-full bg-orange-200 pt-1 pb-1 pr-3 pl-3">
        {{ reversedMemos.length }}件
      </div>
    </div>
    <div
      class="nothing-memo flex flex-col items-center mt-12 gap-2"
      v-if="reversedMemos.length === 0"
    >
      <MemoIcon class="w-14 text-gray-300" />
      <p class="text-xl text-gray-600">まだメモがありません</p>
      <p class="text-sm text-gray-400">上の入力欄からメモを作成してみましょう！</p>
    </div>
    <MemoCard
      v-for="memo in reversedMemos"
      :key="memo.id"
      :content="memo.content"
      :timestamp="memo.timestamp"
      :id="memo.id"
      @updated="$emit('updated')"
    />
  </div>
</template>
