<script>
import axios from "axios";

export default {
  data() {
    return {
      content: null
    }

  },

  mounted() {
    axios.get(`/book/${this.$route.params.id}/content`)
        .then(res => {
          this.content = res.data.data.content
        })
  }
}
</script>

<template>
<h1>{{content}}</h1>
</template>

<style scoped>

</style>