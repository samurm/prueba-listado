import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    redirect: { name: "read" }
  },
  {
    path: "/read",
    name: "read",
    component: () => import("@/views/List.vue")
  },
  {
    path: "/create",
    name: "create",
    component: () => import("@/views/Create.vue")
  }
];

const router = new VueRouter({
  routes
});

export default router;
