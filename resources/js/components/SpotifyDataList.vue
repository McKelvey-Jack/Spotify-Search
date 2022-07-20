<template>
<div>
    <spotify-data-list-item v-for="(item, index) in data" :key="item.name + index" class="card col-sm-6"
      :item="item">
    </spotify-data-list-item>
</div>
</template>

<script>
import spotifyDataListItem from './SpotifyDataListItem.vue'
export default {
  components: {spotifyDataListItem},
  props: ['data']
  
}
</script>

<style lang="scss" scoped>

.card {
  margin-bottom: 1rem;
}

</style>