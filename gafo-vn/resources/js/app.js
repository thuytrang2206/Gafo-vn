import './bootstrap';
import {createApp} from 'vue';
// import search from './client/search.vue';
// import cart from './client/cart.vue';
import admin from './admin.vue';
import Headertop from './layout/admin/header.vue'
import Footerbottom from './layout/admin/footer.vue'
const app = createApp({});

// const components = [
//     // search,
//     // cart
// ];
app.component('headertop',Headertop);
app.component('index',admin);
app.component('footerbottom',Footerbottom);
//components.forEach(component => app.component(component.name, component));

 app.mount('#admin');


// setup component to admin

// const appAdmin = createApp(Headertop);
// appAdmin.mount('#admin');