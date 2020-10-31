<template>
  <div class="create">
    <h1>Crear tarea</h1>
    <v-form ref="form" v-model="valid">
      <v-row>
        <v-col cols="12" md="4" class="pb-0">
          <v-text-field
            label="Nombre de la tarea"
            dense
            outlined
            v-model="nombreTarea"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" md="4" class="pt-0">
          <v-btn
            class="primary"
            color="primary"
            width="100%"
            depressed
            @click.stop="createTasks()"
            :disabled="!valid"
            >Crear</v-btn
          >
        </v-col>
      </v-row>
    </v-form>
  </div>
</template>

<script>
import ApiService from "@/common/api.service";

export default {
  name: "List",
  data: () => ({
    valid: false,
    nombreTarea: ""
  }),
  async created() {},
  components: {},
  methods: {
    async createTasks() {
      await this.$refs.form.validate();
      if (this.valid) {
        await ApiService.post(`prueba.php`, {
          action: "create",
          nombre_tarea: this.nombreTarea
        }).then(() => {
          this.$router.push({ name: "read" });
        });
      }
    }
  },
  computed: {}
};
</script>
