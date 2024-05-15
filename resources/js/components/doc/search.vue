<div class="header-search">
  <form @submit.prevent="submitForm" action="#" method="GET">
    <button type="submit">
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>
    <input name="search" type="text" v-model="searchQuery" placeholder="Что будем искать в мире аниме?"
      class="search-input-fa" autocomplete="off">
  </form>
</div>


  <!-- search Start media 630px -->
  <section class="search">
    <div class="search-inner">
      <div class="search-tit">
        <div class="header-search spm-search">
          <form action="/catalog" method="GET">
            <button type="submit">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <input name="search" type="text" v-model="searchQuery" placeholder="Что будем искать в мире аниме?"
              class="search-input-fa" autocomplete="off">
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- search End media 630px -->