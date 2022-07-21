<template>
    <div>
        <img v-if="item.album.images.length > 0" class="card-img-top image" :src="item.album.images[0].url" alt="search_result_image">
        <img v-else class="card-img-top image" src="/storage/Image-Coming-Soon-Placeholder-600x600.png" alt="search_result_image">
        <div class="card_content">
            <h3 class="card-title"><a class="title_link" target="_blank" :href="item.external_urls.spotify">{{item.name}}</a></h3>
            <div class="card_content_section">
                <span class="list_label">Artist:</span>
                <div class="list_container">
                    <p v-for="(artist,index) in item.artists" :key="artist + index">{{artist.name}}<span v-if="index < item.artists.length - 1 && item.artists.length > 1">,&nbsp;</span></p>
                </div>
            </div>
            <div class="card_content_section">
                <span class="list_label">Album:</span>
                <p>{{item.album.name}}</p>
            </div>
            <div v-if="item.preview_url" class="card_content_section">
                <a class="preview_link" target="_blank" :href="item.preview_url">Preview</a>
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
 .preview_link {
    color: #1DB954;
    text-decoration: none;
 }
</style>