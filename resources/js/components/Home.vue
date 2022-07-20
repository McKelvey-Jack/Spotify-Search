<template>
    <div class="page_container">
        <header>
            <div class="logo_container">
                <p>Spotify Search</p>
            </div>
            <search @fetchData="fetchSpotifyData" />
        </header>
        <main v-if="dataToDisplay.length > 0">
            <spotify-search-data-list 
                :data="dataToDisplay">
            </spotify-search-data-list>
            <pagination-footer 
                :totalPages="totalPages"
                :page="page"
                @handlePageToggleButton="togglePage"
                >
            </pagination-footer>
        </main>
    </div>
</template>

<script>
import search from "./Search.vue";
import paginationFooter from './PaginationFooter.vue'
import spotifySearchDataList from './SpotifySearchDataList.vue'
export default {
    components: { search, paginationFooter, spotifySearchDataList },
    data() {
        return {
            searchData: [],
            page: 0,
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
                    if (paginationCall) {
                        let newItems = this.searchData
                        newItems.push(...data[this.searchDataKey].items)
                        this.searchData = newItems
                    } else {
                        this.page = 0
                        this.totalPages = data[this.searchDataKey].total
                        this.searchData = data[this.searchDataKey].items
                    }
                }).catch((err)=>{
                    console.log(err)
                })
        },
        togglePage(button) {
            if (button === 'previous') {
                this.page -= 1
            } else {
                this.page += 1
                if (this.dataToDisplay.length === 0) {
                    this.paginationDataCall()
                }
            }
        },
        paginationDataCall() {
            this.fetchSpotifyData(this.lastSearchInput, this.lastType, true)
        }
    },
    computed: {
        offset() {
            return this.page * 20;
        },
        dataToDisplay() {
            return this.searchData.slice(this.offset, this.offset + 20)
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
