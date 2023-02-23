require('./bootstrap');
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3'
import { store } from './store'
import VueLazyLoad from 'vue3-lazyload'

import * as VueRouter from 'vue-router'
import { BootstrapVue3 } from 'bootstrap-vue-3'
import { Inertia } from '@inertiajs/inertia'
import {RouterLink} from 'vue-router'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.js';


createInertiaApp({
  resolve: name => require(`./components/${name}`),
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
      .use(Inertia)
      .use(VueLazyLoad)
      .use(RouterLink)
      .use(store)
      .use(BootstrapVue3)
      .use(plugin)
      .mount(el)
  }
})