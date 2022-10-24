<template>
  <div class="container">
    <h1>pagina post</h1>

  </div>
</template>

<script>
export default {
    name: 'singlePostPage',
    methods: {
        getSinglePostPage() {
            const slug = this.$route.params.slug;
            axios.get('/api/posts/' + slug)
            .then((response) => {
                this.post = response.data.results;
            });
        }
    },
    mounted() {
        this.getSinglePostPage();
    }
}
</script>

<style>

</style>