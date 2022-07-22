<template>
    <div>
        <img v-if="item.images.length > 0" class="card-img-top image" :src="item.images[0].url" alt="search_result_image">
        <img v-else class="card-img-top image" src="/storage/Image-Coming-Soon-Placeholder-600x600.png" alt="search_result_image">
        <div class="card_content">
            <div class="card_title_container">
                <h3 class="card_title"><a class="title_link" target="_blank" :href="item.external_urls.spotify">{{item.name}}</a></h3>
                <div class="list_container">
                    <p class="list_item" v-for="(artist,index) in item.artists" :key="artist + index">{{artist.name}}<span v-if="index < item.artists.length - 1 && item.artists.length > 1">,&nbsp;</span></p>
                </div>
            </div>
            <div class="card_content_section">
                <span class="list_label"><i class="fas fa-calendar list_icon"></i></span>
                <p>{{item.release_date}}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['item'],
}
</script>

<style scoped>

</style>