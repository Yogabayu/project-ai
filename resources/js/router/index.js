import {
  createRouter,
  createWebHistory
} from "vue-router";

const router = createRouter({
  history: createWebHistory("/"),
  routes: [{
      path: "/",
      redirect: (to) => {
        return "/dashboard";
      },
    },
    {
      path: "/dashboard",
      component: () => import("../layouts/blank.vue"),
      children: [{
        path: "",
        component: () => import("../pages/user/dashboard.vue"),
      }, ],
    },
  ],
});

export default router;
