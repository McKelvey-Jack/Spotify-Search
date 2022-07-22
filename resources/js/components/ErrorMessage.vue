<template>
    <div class="error_container" v-if="error">
        <p class="error_text">Something has gone wrong!</p>
        <p class="error_text">Error Message:&nbsp;"{{error.data.error}}"</p>
    </div>
</template>

<script>
export default {
    props: ['error']

}
</script>

<style scoped>
   .error_container {
      margin-top: 1rem;
        width: 100%;
        text-align: center;
    }
    .error_text {
        color: red;
    }

</style>