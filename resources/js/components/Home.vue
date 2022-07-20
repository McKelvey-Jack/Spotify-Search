<template>
    <div class="page_container">
        <header>
            <div class="logo_container">
                <p>Spotify Search</p>
            </div>
            <search @fetchData="fetchSpotifyData" />
        </header>
        <main v-if="searchData.length > 0">
            <spotify-data-list 
                :data="searchData"
                class="row">
            </spotify-data-list>
            <pagination-footer 
                :totalPages="totalPages"
                :page="page"
                @handlePaginationDataCall="paginationDataCall"
                >
            </pagination-footer>
        </main>
    </div>
</template>

<script>
import search from "./Search.vue";
import paginationFooter from './PaginationFooter.vue'
import spotifyDataList from './SpotifyDataList.vue'
export default {
    components: { search, paginationFooter, spotifyDataList },
    data() {
        return {
            searchData: [],
            pagesLoaded: 1,
            lastType: null,
            lastSearchInput: null,
            totalPages: null
        }
    },
    methods: {
        fetchSpotifyData(searchInput, type, paginationCall = false) {
            this.lastType = type
            this.lastSearchInput = searchInput
            Vue.axios
                .get(route("search", searchInput), {
                    params: {
                        type: type,
                        offset: this.offset
                    },
                })
                .then(({ data }) => {
                    const list = data[this.searchDataKey]
                    if (paginationCall) {
                        let newItems = this.searchData
                        newItems.push(...list.items)
                        this.searchData = newItems
                    } else {
                        this.page = 0
                        this.totalPages = list.total
                        this.searchData = list.items
                    }
                }).catch((err)=>{
                    console.log(err)
                })
        },
        paginationDataCall() {
            this.page += 1
            this.fetchSpotifyData(this.lastSearchInput, this.lastType, true)
        }
    },
    computed: {
        offset() {
            return this.pagesLoaded * 20;
        },
        searchDataKey() {
            let type = this.lastType + 's'
            return type
        },
    }
};
</script>

<style lang="scss" scoped>
.page_container {
    min-height: 100vh;
    background-color: #ffffff;
}
</style>
