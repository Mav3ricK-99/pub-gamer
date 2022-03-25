<template>
  <component :is="layout">
    <slot />
  </component>
</template>

<script>
import AppLayoutDefault from './AppLayoutDefault.vue'
import {shallowRef} from 'vue'; 

export default {
  name: "AppLayout",
  data: () => ({
    layout: AppLayoutDefault
  }),
  watch: {
    $route: {
      immediate: true,
      async handler(route) {
        try {
          const component = await import(`/${route.meta.layout}.vue`);
          this.layout = shallowRef(component?.default);
        } catch (e) {
          this.layout = shallowRef(AppLayoutDefault);
        }
      }
    }
  }
}
</script>