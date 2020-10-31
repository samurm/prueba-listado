<template>
  <v-app>
    <listado-prueba-navigation-drawer />
    <listado-prueba-navigation-drawer-mini />
    <v-main>
      <div class="py-2 px-4">
        <router-view></router-view>
      </div>
    </v-main>
  </v-app>
</template>
<script>
import ListadoPruebaNavigationDrawer from "./components/listado-prueba-navigation-drawer";
import ListadoPruebaNavigationDrawerMini from "./components/listado-prueba-navigation-drawer-mini";

export default {
  name: "App",

  components: {
    ListadoPruebaNavigationDrawer,
    ListadoPruebaNavigationDrawerMini
  },

  data: () => ({})
};
</script>
