<script lang="ts" setup>
import { ref } from "vue";

const userName = ref("");
const display_id = ref("");
const password = ref("");
const errors = ref({});
const hasErrors = ref(false);
axios.defaults.headers.common["X-CSRF-TOKEN"] =
  document.querySelector('meta[name="csrf-token"]').content;

const handleSignup = async () => {
  try {
    const response = await axios.post("/signup", {
      name: userName.value,
      display_id: display_id.value,
      password: password.value,
    });
    window.alert(`${userName.value}さん、サインアップに成功しました！`);
    window.location.href = "/app";
  } catch (error: any) {
    hasErrors.value = true;
    if (error.response?.status === 422) {
      errors.value = error.response.data.errors;
      console.log(errors.value);
    } else {
      console.error(error);
    }
  }
};
</script>
<template>
  <div class="component-root">
    <div
      class="errors w-[90%] mx-auto rounded-md bg-red-200 border border-[1.5px] border-red-300 my-6 py-2 px-3 dark:bg-red-900 dark:border-red-300"
      v-if="hasErrors"
    >
      <p class="text-text my-1" v-if="errors.name"></p>
      <p class="text-text my-1" v-if="errors.display_id" v-for="error in errors.display_id">
        {{ error }}
      </p>
      <p class="text-text my-1" v-if="errors.password" v-for="error in errors.password">
        {{ error }}
      </p>
    </div>
    <form @submit.prevent="handleSignup" class="flex flex-col items-start gap-3 w-[90%] m-auto">
      <label for="name" class="text-text text-lg">ユーザーネーム</label>
      <input
        type="text"
        id="userName"
        v-model="userName"
        class="border border-[1.5px] border-gray-300 outline-none focus:border-sky-300 w-full leading-[2rem] px-3 py-1 focus:shadow-sky-300 focus:shadow-sm rounded-md dark:text-zinc-300 dark:bg-zinc-700"
      />
      <label for="id" class="text-text text-lg">ID</label>
      <input
        type="text"
        id="display_id"
        v-model="display_id"
        class="border border-[1.5px] border-gray-300 outline-none focus:border-sky-300 w-full leading-[2rem] px-3 py-1 focus:shadow-sky-300 focus:shadow-sm rounded-md dark:text-zinc-300 dark:bg-zinc-700"
      />
      <label for="password" class="text-text text-lg">パスワード</label>
      <input
        type="password"
        id="password"
        v-model="password"
        class="border border-[1.5px] border-gray-300 outline-none focus:border-sky-300 w-full leading-[2rem] px-3 py-1 focus:shadow-sky-300 focus:shadow-sm rounded-md dark:text-zinc-300 dark:bg-zinc-700"
      />
      <button
        class="mx-auto mt-6 bg-gradient-to-r from-primary to-secondary rounded-md flex items-center h-10 justify-center w-[40%] text-white font-bold cursor-pointer"
      >
        サインイン
      </button>
    </form>
  </div>
</template>
<script setup lang="ts"></script>
