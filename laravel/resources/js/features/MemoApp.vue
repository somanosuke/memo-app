<script setup lang="ts">
import Header from "../components/Header.vue";
import Textarea from "../components/TextareaForm.vue";
import Bottom from "../components/Bottom.vue";
import MemoList from "../features/MemoList.vue";
import DarkToggle from "../components/darkModeToggle.vue";
import { ref, onMounted } from "vue";
import api from "@/bootstrap";

const memos = ref([]);

async function getMemos() {
  const res = await api.get("/app/getMemos");
  memos.value = res.data;
}

onMounted(() => {
  getMemos(); //初回ロードで取得する
});
</script>

<template>
  <div
    class="page-root bg-gradient-to-r from-lightPrimary to-lightSecondary pb-20 min-h-screen flex flex-col items-center gap-8"
  >
    <Header />
    <div class="max-w-2xl w-[96%] flex justify-end">
      <DarkToggle />
    </div>
    <Textarea @updated="getMemos" />
    <MemoList :memos="memos" @updated="getMemos" />
    <Bottom />
  </div>
</template>
