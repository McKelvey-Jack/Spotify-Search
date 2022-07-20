<template>
<div>
  <div v-for="(item, index) in data" :key="item.name + index">
    <spotify-data-list-item 
      :item="item">
    </spotify-data-list-item>
  </div>
</div>
</template>

<script>
import spotifyDataListItem from './SpotifyDataListItem.vue'
export default {
  components: {spotifyDataListItem},
  props: ['data']
  
}
</script>

<style>

</style>