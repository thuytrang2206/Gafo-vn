import {createApp} from 'vue';
import * as VueRouter from 'vue-router';
import App from "./admin.vue";

// LightBootstrap plugin
import './bootstrap';

// router setup
import routes from "./routes/routes.js";

// import "./registerServiceWorker";
// plugin setup
//window.vue=Vue.use(VueRouter);
// Vue.use(LightBootstrap);

// configure router
const router =  VueRouter.createRouter({
  routes, // short for routes: routes
   history: VueRouter.createWebHashHistory(),
});

/* eslint-disable no-new */
// new Vue({
//   el: "#app",
//   render: (h) => h(App),
//   router,
// });
createApp(App).use(router).mount('#app')


