<template>
    <div>
        <img v-if="item.images.length > 0" class="card-img-top image" :src="item.images[0].url" alt="search_result_image">
          <img v-else class="card-img-top image" src="/storage/Image-Coming-Soon-Placeholder-600x600.png" alt="search_result_image">
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
export default {
    props: ['item'],
}
</script>

<style scoped>

 .playlist_description {
    font-style: italic;
 }
</style>