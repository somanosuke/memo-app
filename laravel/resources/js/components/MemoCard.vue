<script lang="ts" setup>
import Trash from "./svgs/TrashSvg.vue";
import { ref } from "vue";
import api from "@/bootstrap.ts";

const props = defineProps<{
  id: number;
  content: string;
  timestamp: string;
}>();
const { id, content, timestamp } = props;
const emit = defineEmits(["updated"]);

async function deleteMemo() {
  await api.post("/app/delete", { id: id }).then((res) => {
    console.log(res.data.message);
  });
  emit("updated");
}

const isHover = ref(false);
</script>

<template>
  <div
    class="component-root bg-white shadow-lg border border-solid border-orange-100 p-6 rounded-xl flex justify-between items-center"
    @mouseover="isHover = true"
    @mouseleave="isHover = false"
  >
    <div class="text">
      <p class="text-lg font-normal">{{ props.content }}</p>
      <p class="text-md font-light text-gray-500">{{ props.timestamp }}</p>
    </div>
    <Trash class="trash-button cursor-pointer" v-if="isHover" @click="deleteMemo" />
  </div>
</template>
