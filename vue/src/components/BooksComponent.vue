<script>
import axios from "axios";
import BookCardComponent from "@/components/BookCardComponent.vue";

export default {
  components: {
    bookCardComponent: BookCardComponent
  },

  mounted() {
    this.$store.dispatch('getUserBooks')
  }
}

</script>

<template>
  <div v-for="book in $store.getters.BOOKS" class="books">
  <bookCardComponent :book-id="book.id"
                     :book-title="book.title"
                     :users="book.users"
                     class="card"
                     @click="DeleteBook(book.id)"
  />
    <button class="btn btn-danger" @click="$store.dispatch('deleteBook', book.id)">delete</button>
    <button class="btn btn-primary" @click="$router.push(`/book/${book.id}/update`)">update</button>
  </div>

  <button v-for="page in $store.getters.NUMPAGES" class="btn btn-primary" @click="$store.dispatch('switchPage', page)">{{page}}</button>
</template>

<style scoped>
.books {
  float: left;
  margin-left: 10px;
}
</style>
