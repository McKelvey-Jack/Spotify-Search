<template>
<div class="list_container">
  <component v-for="(item, index) in data" 
    :key="item.name + index" 
    class="card col-sm-6 col-md-4 col-xl-3 m2 p2 " 
    :is="`spotify${type}`" 
    :item="item">
  </component>
</div>
</template>

<script>
import spotifyartist from './cards/SpotifyArtist.vue'
import spotifytrack from './cards/SpotifyTrack.vue'
import spotifyplaylist from './cards/SpotifyPlaylist.vue'
import spotifyalbum from './cards/SpotifyAlbum.vue'

export default {
  components: {spotifyartist, spotifytrack, spotifyplaylist, spotifyalbum},
  props: ['data', 'type']
  
}
</script>

<style scoped>

.card {
  margin-bottom: 1rem;
  padding: 0;
}

.list_container {
  margin: 1rem 2rem;
}

</style>