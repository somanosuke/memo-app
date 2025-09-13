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
        <MemoIcon class="w-7 text-primary" />
        <p class="font-medium text-text text-xl">保存されたメモ</p>
      </div>
      <div
        class="text-sm number-chip text-gray-700 rounded-full bg-orange-200 pt-1 pb-1 pr-3 pl-3 dark:bg-slate-800 dark:text-subtext"
      >
        {{ reversedMemos.length }}件
      </div>
    </div>
    <transition-group name="add-memo" tag="div" class="flex flex-col gap-4">
      <MemoCard
        v-for="memo in reversedMemos"
        :key="memo.id"
        :id="memo.id"
        :content="memo.content"
        :timestamp="memo.timestamp"
        :name="memo.user_name"
        :display_id="memo.user_display_id"
        @updated="$emit('updated')"
      />
    </transition-group>
  </div>
  <transition name="fade" mode="out-in">
    <div
      class="nothing-memo flex flex-col items-center mt-12 gap-2 opacity-70"
      v-if="reversedMemos.length === 0"
    >
      <MemoIcon class="w-14 text-text" />
      <p class="text-xl text-text">まだメモがありません</p>
      <p class="text-sm text-subtext">上の入力欄からメモを作成してみましょう！</p>
    </div>
  </transition>
</template>
<style scoped>
.add-memo-leave-active {
  transition: all 0.2s;
}

.add-memo-enter-active {
  transition: all 0.3s;
}

.add-memo-move {
  transition: transform 0.3s;
}

.add-memo-enter-from {
  opacity: 0;
  transform: translateX(30px);
}

.add-memo-leave-to {
  opacity: 0;
  transform: translateX(-30px);
}

.fade-enter-active,
.fade-leave-active {
  transition: all 0.3s;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: scale(0.9);
}
</style>
