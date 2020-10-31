export default {
  name: "listado-prueba-modal-remove-task",
  data: () => ({}),
  computed: {
    modalRemoveTask: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit("input", value);
      }
    }
  },
  props: {
    removeTaskName: String,
    value: Boolean
  },
  components: {},
  methods: {
    removeItem() {
      this.$parent.removeItem();
    }
  },
  watch: {}
};
