<template>
    <section class="header-search">
        <div class="header-search-inner">
            <form @submit.prevent="submitForm" action="#" method="GET">
                <input name="search" type="text" v-model="searchQuery" placeholder="Что будем искать в мире аниме?"
                       class="search-input-fa" autocomplete="off">
                <button type="submit" class="raco-primary pd-large raco-awsome-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            searchQuery: ''
        };
    },
    methods: {
        submitForm() {
            console.log(this.searchQuery);
            window.location.href = `/catalog?search=${encodeURIComponent(this.searchQuery)}`;
        }
    }
}
</script>

<style lang="scss" scoped>
.header-search {
    padding: 5px 10px;
    width: 100%;
    position: sticky;
    top: 75px;
    z-index: 900;

    &-inner {
        max-width: var(--ota-ku-max-width);
        margin: 0 auto;
        width: 100%;

        form {
            display: flex;
            width: 100%;
            background-color: var(--cl-10);
            padding: 10px;
            border-radius: 10px;
            border: 1px solid var(--cl-5);

            input {
                width: 100%;
                border-top-left-radius: 10px;
                border-bottom-left-radius: 10px;
            }

            button {
                width: 50px;
                border-top-right-radius: 10px;
                border-bottom-right-radius: 10px;
            }
        }
    }
}
</style>
