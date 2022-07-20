<template>
    <div>
        <h3>{{item.name}}</h3>
        <p>{{item.followers.total}}</p>
        <p>{{item.genres}}</p>
        <img :src="item.images[0].url" alt="search_result_image">
    </div>
</template>

<script>
export default {
    props: ['item']

}
</script>

<style>

</style>