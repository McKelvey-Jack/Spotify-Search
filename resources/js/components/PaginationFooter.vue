<template>
  <div>
    <button v-if="page < totalPages" @click="handleButtonClick('next')">More</button>
  </div>
</template>

<script>
export default {
    props: ['totalPages', 'page'],
    methods: {
        handleButtonClick(button) {
            this.$emit("handlePaginationDataCall")
        }
    },
}
</script>

<style>

</style>