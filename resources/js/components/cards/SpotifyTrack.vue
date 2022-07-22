<template>
    <div>
        <card-image :images="item.album.images"></card-image>
        <div class="card_content">
            <div class="card_title_container">
                <h3 class="card_title">
                    <a class="title_link" target="_blank" :href="item.external_urls.spotify">{{item.name}}</a>
                    <span v-if="item.preview_url">
                        <a v-if="item.preview_url" class="preview_link" target="_blank" :href="item.preview_url">
                            <i class="fas fa-play-circle"></i>
                        </a>
                    </span>
                </h3>
                <div class="list_container">
                    <p v-for="(artist,index) in item.artists" :key="artist + index">{{artist.name}}<span v-if="index < item.artists.length - 1 && item.artists.length > 1">,&nbsp;</span></p>
                </div>
            </div>
            <div class="card_content_section">
                <span class="list_label"><i class="fas fa-record-vinyl list_icon"></i></span>
                <p>{{item.album.name}}</p>
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
 .preview_link {
    color: #1DB954;
    text-decoration: none;
    font-size: 1.1rem;
 }
</style>