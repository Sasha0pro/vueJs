<script>
import axios from "axios";

export default {
  mounted() {
    this.$store.commit('getContent', this.$route.params.id)
  }
}
</script>

<template>
<h1>{{$store.getters.BOOKS.content}}</h1>
</template>

<style scoped>

</style>