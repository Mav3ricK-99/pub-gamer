<template>
    <div class="bg-[#2c365d] w-full flex flex-row p-2 shadow-md justify-center space-x-52">
      <div class="ml-8 flex flex-row space-x-16">
       
        <img :src="logo" class="w-80">
        <div class="self-end mb-2 space-x-5">
          <Splitbutton styleClass="p-tieredmenu" class="navButton" label="Productos" :model="getProductosItems(prod)"/>
          <button class="text-[#f2f2f0] bg-[#272e4f] text-lg rounded-md px-4 py-1.5">
            <Link href="./usuario">Ofertas</Link>
          </button>
          <button class="text-[#f2f2f0] bg-[#272e4f] text-lg rounded-md px-4 py-1.5">
            <Link href="./usuario">Ayuda</Link>
          </button>
        </div>
      </div>

      <div class="flex flex-row items-center self-center space-x-4">
        
        <InputBusqueda/>
        <div class="bg-cover">
          <img class="object-cover" width="26" :src="notif" />
        </div>
        <button class="text-[#f2f2f0] bg-[#272e4f] text-lg p-2 rounded-md">
          Perfil
        </button>
        
      </div>
    
    </div>
    
 
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import logo from "../../../logos/pubgamer.png";
import notification from "../../../logos/notification.png";
import InputBusqueda from "../InputBusqueda.vue";
import Splitbutton from 'primevue/splitbutton';

let productos;
export default {

  data () {
    return {
      logo: logo,
      notif: notification,
      prod: [
                  {
                    label:'File',
                    icon:'pi pi-fw pi-file',
                    items:[
                        
                    ]
          }]
    };
  },
  name: "AppHeaderLayout",
  components: {
    Link,
    InputBusqueda,
    Splitbutton
  },
  methods: {
    getProductosItems: function (xd){
      xd[0].items = [{
         label:'XD',
         icon:'pi pi-fw pi-file',
         style: "border:none;padding:0",
         class:'bg-[#272e4f] navButton',
      }];
      return xd;
    }
  },
};

</script>

<style lang="scss" scoped>

::v-deep(.navButton) {
    .p-button {
      border: none;
      outline: none;
      background: #272e4f;
      color: #f2f2f0;
      font-family: core-sans;
      font-size: 1.125rem;
      line-height: 1.75rem;
      padding-left: 1rem; /* 16px */
      padding-right: 1rem; /* 16px */
      padding-top: 0.375rem; /* 6px */
      padding-bottom: 0.375rem; /* 6px */
    }

    .p-button:focus {
      box-shadow: none;
    }

    .p-menu{
      background:red;  
    }

    .p-submenu-list{
      background: red;
    }
}
</style>

