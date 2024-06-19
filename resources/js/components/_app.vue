<template>
    <router-view/>
</template>
<script lang="ts">
import {compileToFunction, defineComponent, watch} from 'vue';
import { RouteLocationNormalized, Router } from 'vue-router';

export default defineComponent({
    mounted() {
        watch(
            () => this.$route,
            (to: RouteLocationNormalized, from: RouteLocationNormalized) => {
                console.log('routeChanged:', to.fullPath);
                setTimeout(function compileToFunction() {
                    window.scrollTo({top: 0});
                },0.2)
            }
        );
    },
});
</script>
<style>

</style>
