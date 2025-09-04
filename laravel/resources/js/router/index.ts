import { createRouter, createWebHistory } from "vue-router";
import { routes } from "vue-router/auto-routes";
import Index from "../pages/index.vue";
import App from "../pages/app.vue";

const routes = [
  { path: "/", component: Index },
  { path: "/app", component: App },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
