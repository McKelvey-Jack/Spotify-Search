<template>
    <div class="search_container">
        <select class="list_container" v-model="selectedType">
            <option v-for="item in types" :key="item + 'item'">
                {{ item }}
            </option>
        </select>
        <input type="text" v-model="searchInput" />
        <button @click="handleSearch">Go</button>
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

<style lang="scss"></style>
