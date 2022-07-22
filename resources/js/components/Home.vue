<template>
    <div class="page_container">
        <header-component @fetchData="fetchSpotifyData" />
        <main v-if="searchData && !loading">
            <div class="list_container" v-if="searchData.length > 0">
                <spotify-data-list 
                    :data="searchData"
                    :type="lastType"
                    class="row justify-content-center">
                </spotify-data-list>
                <pagination-footer
                    :totalPages="totalPages"
                    :pagesLoaded="pagesLoaded"
                    @handlePaginationDataCall="paginationDataCall">
                </pagination-footer>
            </div>
            <p v-else class="no_data_message"> No Data for this search :(</p>
        </main>
        <pulse-loader class="loader" color='#1DB954' :loading="loading"></pulse-loader>
    </div>
</template>

<script>

import HeaderComponent from "./HeaderComponent.vue";
import paginationFooter from './PaginationFooter.vue'
import spotifyDataList from './SpotifyDataList.vue'
import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

export default {
    components: { HeaderComponent, paginationFooter, spotifyDataList, PulseLoader },
    data() {
        return {
            searchData: null,
            pagesLoaded: 1,
            lastType: null,
            lastSearchInput: null,
            totalPages: null,
            loading: false
        }
    },
    methods: {
        fetchSpotifyData(searchInput, type, paginationCall = false, ) {
            this.lastType = type
            this.lastSearchInput = searchInput
            if (!paginationCall) this.loading = true
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
                        this.pagesLoaded += 1
                        let newItems = this.searchData
                        newItems.push(...list.items)
                        this.searchData = newItems
                    } else {
                        this.pagesLoaded = 0
                        this.totalPages = list.total
                        this.searchData = list.items
                    }
                }).catch((err)=>{
                    console.log(err)
                }).finally(()=>{
                    this.loading = false
                })
        },
        paginationDataCall() {
            this.page += 1
            this.fetchSpotifyData(this.lastSearchInput, this.lastType, true, false)
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

<style scoped>
    .page_container {
        min-height: 100vh;
        background-color: #ffffff;
    }

    .loader {
        text-align: center;
        margin-top: 1rem;
    }

    .no_data_message {
        text-align: center;
        font-size: 1.2rem;
        margin-top: 1rem;
    }
    main {
        max-width: 1400px;
        margin: auto
    }
    .list_container {
        margin: 1rem 2rem;
    }
</style>
