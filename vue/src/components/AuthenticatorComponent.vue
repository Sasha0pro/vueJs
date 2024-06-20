<script>
import axios from "axios";

export default {
  data() {
    return{
      user: {
        username: null,
        password: null
      }
    }
  }
}
</script>

<template>
  <form>
    <label for="exampleInputLogin" class="form-label">username</label><br>
    <div class="mb-3">
      <input type="text" class="form-control-sm-3" id="exampleInputLogin" v-model="user.username" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">password</label><br>
      <input type="password" class="form-control-sm-3" v-model="user.password" id="exampleInputPassword1">
    </div>
    <button type="button" @click="this.$store.dispatch('auth', user)" class="btn btn-primary">auth</button>
  </form>
</template>

<style scoped>

</style>