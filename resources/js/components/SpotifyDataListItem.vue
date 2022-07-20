<template>
    <div>
        <img class="card-img-top" :src="item.images[0].url" alt="search_result_image">
        <h3 style="width: 18rem;" class="card-title">{{item.name}}</h3>
        <p>{{item.followers.total}}</p>
        <p>{{item.genres}}</p>
    </div>
</template>

<script>
export default {
    props: ['item']

}
</script>

<style lang="scss" scoped>

</style>