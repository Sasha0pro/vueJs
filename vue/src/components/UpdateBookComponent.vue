<script>
import axios from "axios";

export default {
  data() {
    return {
      book: {
        bookId: this.$route.params.id,
        title: null,
        content: null,
        userId: null
      }
    }
  },

  mounted() {
    this.$store.dispatch('getAuthors');
  },
}
</script>

<template>
  <form>
    <div class="mb-3">
      <label class="form-label">title</label><br>
      <input type="text" class="form-control-sm-3" v-model="book.title">
    </div>
    <div class="mb-3">
      <label class="form-label">content</label><br>
      <textarea class="form-control-sm-3" v-model="book.content"></textarea>
    </div>
    <div class="mb-3">
      <select v-model="book.userId" multiple>
        <option disabled value="">Выберите Автора</option>
        <option v-for="author in $store.getters.USERS" v-bind:value="author.id">{{author.username}}</option>
      </select>
    </div>
    <button type="button" class="btn btn-success" @click="$store.dispatch('updateBook', book)">update</button>
  </form>
</template>

<style scoped>

</style>