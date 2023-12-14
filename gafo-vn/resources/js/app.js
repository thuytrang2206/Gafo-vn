import {createApp} from 'vue';
import * as VueRouter from 'vue-router';
import App from "./admin.vue";
// LightBootstrap plugin
import './bootstrap.js';
import { FontAwesomeIcon } from '../../node_modules/@fortawesome/vue-fontawesome';
import { library } from "../../node_modules/@fortawesome/fontawesome-svg-core";
import { fas } from '../../node_modules/@fortawesome/free-solid-svg-icons';

// import DataTablesLib from '../../node_modules/datatables.net'; 
// import DataTable from '../../node_modules/datatables.net-vue3/src/datatables.net-vue.vue';
 
//  DataTable.use(DataTablesLib);
import '../../node_modules/vue3-easy-data-table/dist/style.css';
library.add(fas)
// router setup
import routes from "./routes/routes.js";


const router =  VueRouter.createRouter({
  routes, // short for routes: routes
   history: VueRouter.createWebHashHistory(),
   
});

const appAdmin = createApp(App);
appAdmin.component('font-awesome-icon', FontAwesomeIcon);
appAdmin.use(router).mount('#admin');
//createApp(App).component('font-awesome-icon', FontAwesomeIcon).use(router).mount('#admin')