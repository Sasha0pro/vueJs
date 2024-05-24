<script>
import axios from "axios";
import BookCardComponent from "@/components/BookCardComponent.vue";

export default {
  components: {
    bookCardComponent: BookCardComponent
  },
  data() {
    return {
      books: null
    }
  },
  methods: {},
  mounted() {
    axios.get('/main')
        .then(res => {
          this.books = res.data.data
        })
  }
}
</script>

<template>
  <router-link to="/books">my books</router-link>
  <div v-for="book in books" class="books">
    <bookCardComponent :book-id="book.id"
                       :book-title="book.title"
                       :users="book.users"
    />
  </div>
</template>

<style scoped>
.books {
  float: left;
  margin-left: 10px;
}
</style>