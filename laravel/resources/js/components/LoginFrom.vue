<script lang="ts" setup></script>
<template>
  <form action="" class="flex flex-col items-start gap-3 w-[90%] m-auto">
    <label for="id" class="text-text text-lg">ID</label>
    <input
      type="text"
      id="id"
      class="border border-[1.5px] border-gray-300 outline-none focus:border-sky-300 w-full leading-[2rem] px-3 py-1 focus:shadow-sky-300 focus:shadow-sm rounded-md dark:text-zinc-300 dark:bg-zinc-700"
    />
    <label for="password" class="text-text text-lg">パスワード</label>
    <input
      type="password"
      id="password"
      class="border border-[1.5px] border-gray-300 outline-none focus:border-sky-300 w-full leading-[2rem] px-3 py-1 focus:shadow-sky-300 focus:shadow-sm rounded-md dark:text-zinc-300 dark:bg-zinc-700"
    />
    <button
      class="mx-auto mt-6 bg-gradient-to-r from-primary to-secondary rounded-md flex items-center h-10 justify-center w-[40%] text-white font-bold cursor-pointer"
    >
      ログイン
    </button>
  </form>
</template>
