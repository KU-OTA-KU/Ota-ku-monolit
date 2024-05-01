<template>
  <!-- PRIMARY HEADER INIT START-->
  <primary-header></primary-header>
  <!-- PRIMARY HEADER INIT END -->
  <!-- TOP SLIDER INIT START -->
  <top-slider></top-slider>
  <!-- TOP SLIDER INIT END -->
</template>

<script>
import TopSlider from './web/topSlider.vue';
import PrimaryHeader from './web/primaryHeader.vue';

export default {
  components: {
    PrimaryHeader,
    TopSlider
  },
  mounted() {
    console.log('Component mounted.');
  }
}
</script>

<style>
/* index blade custom styles */

</style>
