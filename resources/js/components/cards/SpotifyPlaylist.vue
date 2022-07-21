<template>
    <div>
        <img v-if="item.images.length > 0" class="card-img-top image" :src="item.images[0].url" alt="search_result_image">
          <img v-else class="card-img-top image" src="/storage/Image-Coming-Soon-Placeholder-600x600.png" alt="search_result_image">
        <div class="card_content">
            <h3 class="card-title"><a target="_blank" :href="item.external_urls.spotify">{{item.name}}</a></h3>
            <div class="card_content_section">
                <span class="list_label">Owner:</span>
                <p>{{item.owner.display_name}}</p>
            </div>
            <p class="playlist_description" v-if="item.description">{{item.description}}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ['item'],
}
</script>

<style scoped>

 .playlist_description {
    font-style: italic;
 }
</style>