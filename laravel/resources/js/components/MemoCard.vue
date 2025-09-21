<script lang="ts" setup>
import Trash from "./svgs/TrashSvg.vue";
import Pen from "./svgs/PenSvg.vue";
import { ref, nextTick } from "vue";
import api from "@/bootstrap.ts";
import axios from "axios";
import { useCurrentUserStore } from "../stores/currentuser.js";

const props = defineProps<{
  id: number;
  content: string;
  timestamp: string;
  name: string;
  display_id: string;
}>();
const emit = defineEmits(["updated"]);
const currentUserStore = useCurrentUserStore();
const editTextarea = ref();
const edit = ref({
  isEditing: false,
  row: 0,
  editContent: "",
});

async function deleteMemo() {
  await axios.post("/app/delete", { id: props.id }).then((res) => {
    console.log(res.data.message);
  });
  emit("updated");
}

async function editMemo() {
  edit.value.isEditing = true;
  edit.value.row = props.content.split("\n").length;
  edit.value.editContent = props.content;
  await nextTick(); //v-ifを使っているため描画待ちをする
  editTextarea.value.focus();
}

async function handleEditSubmit() {
  await axios.put(`/app/${props.id}`, { content: edit.value.editContent }).then((res) => {
    console.log(res.data.message);
  });
  emit("updated");
  edit.value.isEditing = false;
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
      <div class="content">
        <p
          v-if="!edit.isEditing"
          class="text-lg font-normal text-text whitespace-pre-wrap max-w-full break-all line-clamp-2"
          :class="{ 'line-clamp-none': isExpanded }"
        >
          {{ content }}
        </p>
        <textarea
          v-else
          name=""
          id=""
          ref="editTextarea"
          class="resize-none w-full leading-[1.75rem] p-3 mt-4 border border-gray-300 rounded-md outline-sky-200 dark:text-zinc-300 dark:bg-zinc-700 dark:outline-sky-900"
          :rows="edit.row"
          v-model="edit.editContent"
          @keydown.enter.prevent="$event.shiftKey ? (edit.editContent += '\n') : handleEditSubmit()"
          @keydown.esc="edit.isEditing = false"
        ></textarea>
      </div>
      <div class="info flex text-md font-light text-subtext gap-4">
        <p>{{ timestamp }}</p>
        <p>
          Noted by <span class="text-text font-normal">{{ name }}</span
          >(@{{ display_id }})
        </p>
      </div>
    </div>
    <div
      class="update-buttons flex flex-col gap-2"
      v-if="isHover && currentUserStore.getCurrentUserId === display_id"
    >
      <Trash class="trash-button text-subtext cursor-pointer" :size="18" @click.stop="deleteMemo" />
      <Pen class="pen-button text-subtext cursor-pointer" :size="18" @click.stop="editMemo" />
    </div>
  </div>
</template>
