<script lang="ts" setup>
import Trash from "./svgs/TrashSvg.vue";
import { ref } from "vue";
import api from "@/bootstrap.ts";
import axios from "axios";

const props = defineProps<{
  id: number;
  content: string;
  timestamp: string;
  name: string;
  display_id: string;
}>();
const { id, content, timestamp } = props;
const emit = defineEmits(["updated"]);

async function deleteMemo() {
  await axios.post("/app/delete", { id: id }).then((res) => {
    console.log(res.data.message);
  });
  emit("updated");
}

const isHover = ref(false);
const isExpanded = ref(false); //省略表示判定
function toggleExpanded() {
  const selection = window.getSelection();
  if (!selection || selection.toString().length === 0) {
    isExpanded.value = !isExpanded.value;
  }
}
</script>

<template>
  <div
    class="component-root bg-background shadow-lg border border-solid border-orange-100 p-6 rounded-xl flex justify-between items-center"
    @mouseover="isHover = true"
    @mouseleave="isHover = false"
    @click="toggleExpanded"
  >
    <div class="text flex-1 max-w-[94%]">
      <p
        class="text-lg font-normal text-text whitespace-pre-wrap max-w-full break-all line-clamp-2"
        :class="{ 'line-clamp-none': isExpanded }"
      >
        {{ content }}
      </p>
      <div class="info flex text-md font-light text-subtext gap-4">
        <p>{{ timestamp }}</p>
        <p>
          Noted by <span class="text-text font-normal">{{ name }}</span
          >(@{{ display_id }})
        </p>
      </div>
    </div>
    <Trash
      class="trash-button text-subtext cursor-pointer"
      size="18"
      v-if="isHover"
      @click.stop="deleteMemo"
    />
  </div>
</template>
