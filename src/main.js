import Vue from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import vuetify from "./plugins/vuetify";

import ApiService from "./common/api.service";

Vue.config.productionTip = false;

ApiService.init();

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount("#app");
