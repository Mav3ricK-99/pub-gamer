require('./bootstrap');
import { createApp, ref, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/saga-blue/theme.css';
import 'primeicons/primeicons.css';
import * as VueRouter from 'vue-router'


const router = VueRouter.createRouter({
  history: VueRouter.createWebHistory(),
  routes: [],
});

createInertiaApp({
  resolve: name => require(`./components/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(PrimeVue)
      .use(router)
      .mount(el)
  },
})
