require('./bootstrap');
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3'
import { store } from './store'
import VueLazyLoad from 'vue3-lazyload'

import { BootstrapVue3 } from 'bootstrap-vue-3'
import {RouterLink} from 'vue-router'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.js';


createInertiaApp({
  resolve: (name) => require(`./components/${name}.vue`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(VueLazyLoad)
      .use(RouterLink)
      .use(store)
      .use(BootstrapVue3)
      .use(plugin)
      .mount(el)
  }
})