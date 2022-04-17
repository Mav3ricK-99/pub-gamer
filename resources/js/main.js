require('./bootstrap');
import { createApp, ref, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/bootstrap4-light-blue/theme.css';
import 'primeicons/primeicons.css';
import { store } from './store'

//import * as VueRouter from 'vue-router'
import {BootstrapVue3} from 'bootstrap-vue-3'
import { Inertia } from '@inertiajs/inertia'

import 'bootstrap/dist/css/bootstrap.min.css';
import "bootstrap/dist/js/bootstrap.js"

//const router = VueRouter.createRouter({
//  history: VueRouter.createWebHistory(),
//  routes: [],
//});



createInertiaApp({
  resolve: name => require(`./components/${name}`),
  setup({ el, App, props, plugin }) {
    let app = createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(PrimeVue)
      .use(BootstrapVue3)
      .use(Inertia)
      .use(store)
      .mount(el)
      
  },
})