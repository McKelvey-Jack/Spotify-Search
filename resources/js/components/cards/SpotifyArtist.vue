<template>
    <div>
        <card-image :images="item.images"></card-image>
        <div class="card_content">
            <h3 class="card-title"><a class="title_link" target="_blank" :href="item.external_urls.spotify">{{item.name}}</a></h3>
            <div class="card_content_section">
                <span class="list_label"><i class="fas fa-user-check list_icon"></i></span>
                <p>{{formatNumber(item.followers.total)}}&nbsp;follower<span v-if="item.followers.total > 0">s</span></p>
            </div>
        </div>
    </div>
</template>

<script>
import cardImage from './CardImage.vue'
export default {
    components: {cardImage},
    props: ['item'],
    methods: {
        formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }
    },
    computed: {
        bestImage() {
            let imgToReturn = this.item.images[0]
            this.item.images.forEach(img => {
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
    max-height: 321px;
}

.list_label {
    font-size: 1.1rem;
}
</style>