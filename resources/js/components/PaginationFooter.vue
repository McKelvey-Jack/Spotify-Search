<template>
  <div class="button_container">
    <button @click="handleButtonClick('next')" type="button" class="btn btn-outline-secondary">More</button>
  </div>
</template>

<script>
export default {
    props: ['totalPages', 'pagesLoaded'],
    methods: {
        handleButtonClick(button) {
            this.$emit("handlePaginationDataCall")
        }
    },
}
</script>

<style scoped>
.button_container {
    width: 100%; 
    text-align: center; 
    padding-bottom: 1rem;
}
</style>