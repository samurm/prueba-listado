import { LINKS } from "@/constants/links";
import { mapGetters } from "vuex";

export default {
  name: "listado-prueba-navigation-drawer",
  data: () => ({
    links: LINKS
  }),
  computed: {
    ...mapGetters(["getNavigation"])
  },
  methods: {
    toogleNavigation(value) {
      this.$store.commit("setNavigation", value);
    }
  }
};
