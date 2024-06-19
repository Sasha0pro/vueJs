<script>
export default {
  props: ['bookId', "bookTitle", "users"]
}
</script>

<template>
  <div class="container">
    <div class="row">
       <div class="card">
         <h3>{{bookTitle}}</h3>
         <h3 v-for="user in users">{{user.username}}</h3>
         <button class="btn btn-primary" @click="$router.push(`/book/${bookId}/content`)">read</button>
       </div>
    </div>
  </div>
</template>

<style scoped>
.card{
  background-color: #c8a2c8;
  width: 250px;
  height: 300px;
}
</style>