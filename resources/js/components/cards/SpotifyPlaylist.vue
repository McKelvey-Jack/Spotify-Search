<template>
    <div>
        <card-image :images="item.images"></card-image>
        <div class="card_content">
            <div class="card_title_container">
                <h3 class="card_title"><a class="title_link" target="_blank" :href="item.external_urls.spotify">{{item.name}}</a></h3>
                <p>{{item.owner.display_name}}</p>
            </div>
            <div v-if="item.description" class="card_content_section">
            <span class="list_label"><i class="fas fa-info-circle list_icon"></i></span>
            <p class="playlist_description" >{{item.description}}</p>
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

 .playlist_description {
    font-style: italic;
    word-break: break-all;
 }
</style>