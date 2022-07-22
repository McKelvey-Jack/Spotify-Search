<template>
  <div> 
    <img v-if="images.length > 0" class="card-img-top image" :src="bestImage.url" @error="setAltImg" alt="search_result_image">
    <img v-else class="card-img-top image" src="/storage/Image-Coming-Soon-Placeholder-600x600.png" alt="search_result_image">
  </div>
</template>

<script>
export default {
    props: ['images'],
    methods: {
        setAltImg(event) {
            event.target.src = "/storage/Image-Coming-Soon-Placeholder-600x600.png" 
        }
    },
      computed: {
        bestImage() {
            let imgToReturn = this.images[0]
            this.images.forEach(img => {
                if (img.height > 500 && img.height < 700) {
                    imgToReturn = img
                }
            });
            return imgToReturn
        }
    },

}
</script>

<style scoped>
 .image {
    height: 300px;
    object-fit: cover;
 }
</style>