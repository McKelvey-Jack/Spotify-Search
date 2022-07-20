<template>
    <div class="search_container">
        <select class="form-select"  v-model="selectedType">
            <option v-for="item in types" :key="item + 'item'">
                {{ item }}
            </option>
        </select>
        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" v-model="searchInput" />
        <button @click="handleSearch" type="submit" class="btn btn-outline-success go_button">Go</button>
    </div>
</template>
<script>
export default {
    data() {
        return {
            types: ["artist", "album", "track", "playlist"],
            searchInput: "",
            selectedType: "artist",
        };
    },
    methods: {
        handleSearch() {
            this.$emit("fetchData", this.searchInput, this.selectedType);
        },
    },
};
</script>

<style lang="scss">

    .search_container {
        display: grid;
        grid-template-columns: 2fr 5fr 1fr;
    }

    .go_button {
        margin-left: 1rem;
    }

    .form-control:focus {
        border: none;
        box-shadow: 0 0 0 0.25rem rgb(30 215 96 / 25%);
    }

</style>