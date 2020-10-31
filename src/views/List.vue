<template>
  <div class="list">
    <h1>Listado de tareas</h1>
    <v-data-table
      :headers="headers"
      :items="tasks"
      :items-per-page="5"
      class="elevation-1 mt-4"
    >
      <template v-slot:item.actions="{ item }">
        <v-tooltip bottom>
          <template v-slot:activator="{ on }">
            <v-icon
              class="mr-2"
              v-on="on"
              small
              @click.stop="goUpIdTask(item.id)"
            >
              mdi-arrow-up-bold-outline
            </v-icon>
          </template>
          <span>Subir tarea</span>
        </v-tooltip>
        <v-tooltip bottom>
          <template v-slot:activator="{ on }">
            <v-icon
              class="mr-2"
              v-on="on"
              small
              @click.stop="goDownIdTask(item.id)"
            >
              mdi-arrow-down-bold-outline
            </v-icon>
          </template>
          <span>Bajar tarea</span>
        </v-tooltip>
        <v-tooltip bottom>
          <template v-slot:activator="{ on }">
            <v-icon v-on="on" small @click.stop="openModalRemoveTask(item)">
              mdi-trash-can-outline
            </v-icon>
          </template>
          <span>Eliminar tarea</span>
        </v-tooltip>
      </template>
      <template slot="no-data">
        No tienes ninguna tarea
      </template>
    </v-data-table>

    <ListadoPruebaModalRemoveTask
      v-if="removeTaskName"
      v-model="modalRemoveTask"
      :removeTaskName="removeTaskName"
    />
  </div>
</template>

<script>
import ApiService from "@/common/api.service";
import ListadoPruebaModalRemoveTask from "@/components/listado-prueba-modal-remove-task";

export default {
  name: "List",
  data: () => ({
    tasks: [],
    removeTaskName: "",
    modalRemoveTask: false,
    removeTaskId: null
  }),
  async created() {
    const tasks = await ApiService.post(`prueba.php`, { action: "read" }).then(
      ({ data }) => data
    );
    this.tasks = this.sortTasks(tasks);
  },
  components: {
    ListadoPruebaModalRemoveTask
  },
  methods: {
    sortTasks(tasks) {
      return tasks.sort(function(a, b) {
        return a.id - b.id;
      });
    },
    async goUpIdTask(id) {
      const data = { action: "up", id };
      await ApiService.post("prueba.php", data).then(({ data }) => {
        this.tasks = this.sortTasks(data);
      });
    },
    async goDownIdTask(id) {
      const data = { action: "down", id };
      await ApiService.post("prueba.php", data).then(({ data }) => {
        this.tasks = this.sortTasks(data);
      });
    },
    async removeItem() {
      const data = { action: "delete", id: this.removeTaskId };
      await ApiService.post("prueba.php", data).then(({ data }) => {
        this.tasks = this.sortTasks(data);
        this.modalRemoveTask = false;
      });
    },
    openModalRemoveTask(item) {
      this.removeTaskId = item.id;
      this.removeTaskName = item.nombre_tarea;
      this.modalRemoveTask = true;
    }
  },
  computed: {
    headers() {
      return [
        {
          text: "Identificador",
          align: "start",
          sortable: true,
          value: "id"
        },
        {
          text: "Nombre de la tarea",
          align: "start",
          sortable: true,
          value: "nombre_tarea"
        },
        { text: "Acciones", value: "actions", sortable: false, align: "center" }
      ];
    }
  }
};
</script>
