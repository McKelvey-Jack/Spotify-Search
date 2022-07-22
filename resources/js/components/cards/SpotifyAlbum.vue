<template>
    <div>
        <card-image :images="item.images"></card-image>
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
import cardImage from './CardImage.vue'

export default {
    components: {cardImage},
    props: ['item'],
}
</script>

<style scoped>

</style>