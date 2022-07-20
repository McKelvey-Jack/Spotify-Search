<template>
  <div>
    <button v-if="page > 0" @click="handleButtonClick('previous')">previous</button>
    <button v-if="page < totalPages" @click="handleButtonClick('next')">next</button>
  </div>
</template>

<script>
export default {
    props: ['totalPages', 'page'],
    methods: {
        handleButtonClick(button) {
            this.$emit("handlePageToggleButton", button)
        }
    },
}
</script>

<style>

</style>