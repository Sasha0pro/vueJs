<script>
import axios from "axios";
export default {
  name: "RegistrationComponent",
  data() {
    return{
      username: null,
      password: null,
    }
  },
  methods: {
   async registration() {
       await axios.post('/registration', {
          username: this.username,
          password: this.password
        },
            {
              headers: {
                'Content-Type': 'multipart/form-data'
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
    <label for="exampleInputLogin" class="form-label">username</label><br>
    <div class="mb-3">
        <input type="text" class="form-control-sm-3" id="exampleInputLogin" v-model="username" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">password</label><br>
      <input type="password" class="form-control-sm-3" v-model="password" id="exampleInputPassword1">
    </div>
    <button type="button" @click="registration" class="btn btn-primary">registration</button>
  </form>
</template>

<style>

</style>