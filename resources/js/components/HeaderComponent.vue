<template>
      <header class="navbar navbar-light bg-light">
        <div class="logo_container">
            <img class="logo" src="/storage/spotify-brandlogo.net_.png" alt="">
            <h1 class="logo_text">Spotify Search</h1>
        </div>
        <div class="search_container">
            <select class="form-select"  v-model="selectedType">
                <option v-for="item in types" :key="item + 'item'">
                    {{ item }}
                </option>
            </select>
            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" v-model="searchInput" />
            <button :disabled="disabled" @click="handleSearch" type="submit" class="btn btn-success go_button">Go</button>
        </div>
    </header>
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
            if (this.disabled) return
            this.$emit("fetchData", this.searchInput, this.selectedType);
        },
    },
    computed: {
        disabled() {
            return this.searchInput.length === 0
        }
    }
};
</script>

<style lang="scss">

    header {
        padding: 0rem 1rem;
    }

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

    .form-select:focus {
        border: none;
        box-shadow: 0 0 0 0.25rem rgb(30 215 96 / 25%);
    }

    .logo_container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center
    }

    .logo {
        height: 100%;
        max-width: 3rem;
    }

    .logo_text {
        font-size: 1rem;
        color: #1DB954
    }

     @media screen and (max-width: 660px) {
        .logo_container {
            width: 100%;
            text-align: center;
        }

        .search_container {
            width: 100%;
        }
    }

</style>