<script>
import axios from "axios";

export default {
  data() {
    return {
      todo: [],
      newTask: "",
    };
  },


  mounted() {
    axios.get('http://localhost:8888/php-todo-list-json/back/')
    .then((res)=> {
      this.todo = res.data;
    })
    .catch((error) => {
      console.error('Error', error);
    });
  },

  methods: {
    deleteTask(index) {
      this.todo.splice(index, 1);

    },

    addTask() {
      if (this.newTask.trim() !== "") {
        this.todo.push({ name: this.newTask, completed: false });


        this.newTask = "";
      }
    },
  },
};



</script>

<template>
  <h1>To Do di oggi</h1>
  <ul v-for="(todo, index) in todo" :key="index">
    <li>
    <span :class="{ completed: todo.completed }">{{ todo }}</span>
        <button @click="deleteTask(index)">Completato</button>
      </li>
  </ul>
  <div>
      <input v-model="newTask" placeholder="Nuovo task" />
      <button @click="addTask">Aggiungi Task</button>
    </div>



</template>

<style lang="scss">
@use './styles/general.scss';

ul{
  list-style: none;
}

.completed {
  text-decoration: line-through;
}

</style>
