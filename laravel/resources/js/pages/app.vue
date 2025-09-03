<script setup lang="ts">
import Header from "../components/Header.vue";
import Textarea from "../components/TextareaForm.vue";
import Bottom from "../components/Bottom.vue";
import MemoList from "../features/MemoList.vue";
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
    class="page-root bg-gradient-to-r from-amber-50 to-orange-100 pb-20 min-h-screen flex flex-col items-center gap-8"
  >
    <Header />
    <Textarea @saved="getMemos" />
    <MemoList :memos="memos" />
    <Bottom />
  </div>
</template>
