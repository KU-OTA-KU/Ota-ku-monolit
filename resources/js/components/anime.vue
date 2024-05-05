<template>
    <!-- PRIMARY HEADER INIT START-->
    <primary-header></primary-header>
    <!-- PRIMARY HEADER INIT END -->
    <!-- FOOTER INIT START -->
    <Footer></Footer>
    <!-- FOOTER INIT END -->
</template>

<script>
  import Footer from "@/components/web/footer.vue";
  import PrimaryHeader from "@/components/web/primaryHeader.vue";

  export default {
      components: {PrimaryHeader, Footer},
      mounted() {
          console.log('Anime mounted!')
          let headerNavigation = document.querySelector(".header-navigation");
          let headerSearch = document.querySelector(".header-search");
          headerNavigation.style.display = "none";
          headerSearch.style.display = "none";
          let header = document.getElementsByTagName("header")[0];
          header.style.backgroundColor = "transparent";
          header.style.backdropFilter =  "blur(7px)";
      }
  }
</script>
