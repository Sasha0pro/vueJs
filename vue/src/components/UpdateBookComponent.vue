<script>
import axios from "axios";

export default {
  data() {
    return {
      title: null,
      content: null,
      authors: null,
      id: null
    }
  },
  mounted() {
    axios.get('/authors')
        .then(res => {
          this.authors = res.data.data
        })
  },
  methods: {
    async UpdateBook() {
      let jsonId = JSON.stringify(this.id)
      await axios.post(`/book/${this.$route.params.id}/update`,
          {
            title: this.title,
            content: this.content,
            id: jsonId
          },
          {
            headers: {
              'Content-Type': 'multipart/form-data',
              'Authorization': localStorage.getItem('accessToken')
            }
          })
          .catch(function (error){
            if (error.response) {
              console.log(error)
            } else if (error.request) {
              console.log(error)
           }
          })
    }
  }
}
</script>

<template>
  <form>
    <div class="mb-3">
      <label class="form-label">title</label><br>
      <input type="text" class="form-control-sm-3" v-model="title">
    </div>
    <div class="mb-3">
      <label class="form-label">content</label><br>
      <textarea class="form-control-sm-3" v-model="content"></textarea>
    </div>
    <div class="mb-3">
      <select v-model="id" multiple>
        <option disabled value="">Выберите Автора</option>
        <option v-for="author in authors" v-bind:value="author.id">{{author.username}}</option>
      </select>
    </div>
    <button type="button" class="btn btn-success" @click="UpdateBook()">update</button>
  </form>
</template>

<style scoped>

</style>