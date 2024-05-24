<script>
import axios from "axios";
import BookCardComponent from "@/components/BookCardComponent.vue";

export default {
  components: {
    bookCardComponent: BookCardComponent
  },

  data() {
    return {
      books: null,
      numPages: null
    }
  },

  mounted() {
    axios.get('/books', {
      headers: {
        'Authorization': localStorage.getItem('accessToken')
      }
    })
        .then(res => {
          this.books = res.data.data
          this.numPages = res.data.numPages
        })
  },

  methods: {
    SwitchPage(page) {
      axios.get(`/books?page=${page}`,{
        headers: {
          'Authorization': localStorage.getItem('accessToken')
        }
      })
          .then(res => {
            this.books = res.data.data
            this.numPages = res.data.numPages
          })
    },

    DeleteBook(bookId) {
      axios.delete(`/book/${bookId}/delete`,{
        headers: {
          'Authorization': localStorage.getItem('accessToken')
        }
      })

      axios.get('/books', {
        headers: {
          'Authorization': localStorage.getItem('accessToken')
        }
      })
          .then(res => {
            this.books = res.data.data
            this.numPages = res.data.numPages
          })
    }
  }
}

</script>

<template>
  <div v-for="book in books" class="books">
  <bookCardComponent :book-id="book.id"
                     :book-title="book.title"
                     :users="book.users"
                     class="card"
                     @click="DeleteBook(book.id)"
  />
    <button class="btn btn-danger" @click="DeleteBook(book.id)">delete</button>
    <button class="btn btn-primary" @click="$router.push(`/book/${book.id}/update`)">update</button>
  </div>

  <button v-for="page in numPages" class="btn btn-primary" @click="SwitchPage(page)">{{page}}</button>
</template>

<style scoped>
.books {
  float: left;
  margin-left: 10px;
}
</style>
