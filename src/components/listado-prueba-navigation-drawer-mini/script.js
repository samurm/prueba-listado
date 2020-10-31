import { LINKS } from "@/constants/links";
import { mapGetters } from "vuex";

export default {
  name: "listado-prueba-navigation-drawer-mini",
  data: () => ({
    links: LINKS,
    minimizeNavigationMini: false
  }),
  computed: {
    ...mapGetters(["getNavigation"])
  },
  methods: {
    toogleMinimizeNavigationMini() {
      this.minimizeNavigationMini = !this.minimizeNavigationMini;
    }
  }
};
