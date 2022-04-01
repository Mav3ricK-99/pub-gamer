<template>

    <AppHeaderLayout>
    </AppHeaderLayout>

</template>

<script>
import AppHeaderLayout from './AppHeaderLayout.vue'
export default {
  name: "Dashboard",
  components: {
    AppHeaderLayout
  },
  mounted() {
        console.log('mounted!')
        console.log(localStorage.name);
  },
}
</script>