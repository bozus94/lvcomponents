<template>
  <div class="idea">
    <h2 class="text-center">Captura tus ideas</h2>
    <div class="well">
      <h4>¿En que estas pensando?</h4>
      <form v-on:submit.prevent="createIdea">
        <div class="input-group">
          <input type="text" class="form-control input-sm" v-model="newIdea" maxlength="265" />
          <div class="input-group-btn">
            <button type="submit" class="btn btn-sm btn-default">
              Agregar
            </button>
          </div>
        </div>
      </form>
    </div>

    <div class="panel panel-success">
      <!-- Default panel contents -->
      <div class="panel-heading text-center">Mis ideas</div>
      <!-- List group -->
      <ul class="list-group">
        <li v-for="idea in ideas" v-bind:key="idea.id" class="list-group-item">
          <p>
            {{ idea.description }} <br />
            <small class="text-muted">{{ since(idea.created_at) }}</small>
          </p>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import toastr from "toastr";
import moment from "moment";
moment.locale("es");

export default {
  data() {
    return {
      ideas: [],
      newIdea: "",
    };
  } /* data  */,
  created() {
    this.getIdeas();
  } /* created */,
  methods: {
    getIdeas: function() {
      let urlIdeas = "mis-ideas";

      axios.get(urlIdeas).then((res) => {
        this.ideas = res.data;
        console.log(this.ideas);
      });
    },
    since: (date) => moment(date).fromNow(),
    createIdea: function() {
      let urlIdea = "guardar-idea";

      axios
        .post(urlIdea, {
          description: this.newIdea,
        })
        .then((res) => {
          this.getIdeas();
          this.newIdea = "";
          toastr.success("Tarea creada");
        })
        .catch((error) => {
          toastr.error("Ocurrio un error");
        });
    },
  } /* methods */,
};
</script>
