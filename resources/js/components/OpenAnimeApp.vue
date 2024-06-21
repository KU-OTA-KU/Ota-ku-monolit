<template>
    <primary-header></primary-header>
    <v-layout>
        <v-main>
        </v-main>
    </v-layout>
</template>

<script lang="ts">
import PrimaryHeader from "@/components/web/PrimaryHeader.vue";

export default {
    components: {
        PrimaryHeader
    },
    data() {
        return {
            loading: false,
        };
    },
}
</script>

<style scoped lang="sass">

</style>
