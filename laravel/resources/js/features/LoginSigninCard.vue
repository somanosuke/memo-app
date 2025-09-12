<script lang="ts" setup>
import Login from "../components/LoginFrom.vue";
import Signup from "../components/SignupForm.vue";
import { ref } from "vue";

const formType = ref("Login");
</script>
<template>
  <div
    class="component-root bg-background shadow-lg border border-solid border-orange-100 min-h-[500px] max-w-2xl w-[96%] py-10 px-10 rounded-xl overflow-hidden"
  >
    <div
      class="mx-auto w-[80%] overflow-hidden border-text border-b-[1.5px] pb-2 justify-center gap-[20%] flex mb-8 [&>p]:transition [&>p]:duration-300 [&>p]:ease-in-out"
    >
      <p
        :class="
          formType == 'Login'
            ? 'text-text text-xl font-bold'
            : 'translate-y-[58%] font-bold text-xl scale-[0.8] text-subtext opacity-70'
        "
        @click="formType = 'Login'"
      >
        ログイン
      </p>
      <p
        :class="
          formType == 'Signup'
            ? 'text-text text-xl font-bold'
            : 'translate-y-[58%] font-bold text-xl scale-[0.8] text-subtext opacity-70'
        "
        @click="formType = 'Signup'"
      >
        サインアップ
      </p>
    </div>
    <transition name="formType" mode="out-in">
      <Login v-if="formType === 'Login'" />
      <Signup v-else />
    </transition>
  </div>
</template>

<style scoped>
.formType-move,
.formType-enter-active,
.formType-leave-active {
  transition: all ease 0.3s;
}

.formType-enter-from {
  opacity: 0;
  transform: translateX(200px);
}

.formType-leave-to {
  opacity: 0;
  transform: translateX(-200px);
}
</style>
