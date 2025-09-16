import { defineStore } from "pinia";

export const useCurrentUserStore = defineStore("currentUser", {
  state: () => ({
    currentUserDisplayId: "",
    currentUserName: "",
  }),
  getters: {
    getCurrentUserName(state) {
      return state.currentUserName;
    },
    getCurrentUserId(state) {
      return state.currentUserDisplayId;
    },
  },
  actions: {
    updateCurrentUser(displayId, name) {
      this.currentUserDisplayId = displayId;
      this.currentUserName = name;
    },
  },
});
