<template>
<div class="list">
  <component v-for="(item, index) in data" 
    :key="item.name + index" 
    class="card col-sm-6 col-md-5 col-xl-3" 
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

</style>