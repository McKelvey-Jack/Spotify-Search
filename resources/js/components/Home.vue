<template>
    <div class="page_container">
        <header>
            <div class="logo_container">
                <p>Spotify Search</p>
            </div>
            <search @fetchData="fetchSpotifyData" />
        </header>
    </div>
</template>

<script>
import Search from "./Search.vue";
export default {
    components: { Search },
    methods: {
        fetchSpotifyData(searchInput, type) {
            Vue.axios
                .get(route("search", searchInput), {
                    params: {
                        type: type,
                    },
                })
                .then(({ data }) => {
                    console.log(data);
                });
        },
    },
};
</script>

<style lang="scss" scoped>
.page_container {
    min-height: 100vh;
    background-color: #ffffff;
}
</style>
