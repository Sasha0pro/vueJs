<script>
import axios from "axios";

export default {
  data() {
    return{
      username: null,
      password: null,
      accessToken: null
    }
  },
  watch: {
    accessToken(accessToken){
      localStorage.accessToken = accessToken
    }
  },
  methods: {
    async auth() {
      await axios.post('/', {
            username: this.username,
            password: this.password
          },
          {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          })
          .then(res => {
            this.accessToken = res.data.accessToken
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
      <label for="exampleInputLogin" class="form-label">username</label><br>
      <input type="text" class="form-control-sm-3" id="exampleInputLogin" v-model="username">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">password</label><br>
      <input type="password" class="form-control-sm-3" id="exampleInputPassword1" v-model="password">
    </div>
    <button type="button" class="btn btn-primary" @click="auth()">login</button>
  </form>
</template>

<style scoped>

</style>