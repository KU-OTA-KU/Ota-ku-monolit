<template>
    <section class="characters-list">
        <div class="characters-list-inner">
            <div class="characters-list-tit">
                <div class="characters-list-title">
                    <h2>Персонажи</h2>
                    <h6>Персонажи из аниме {{ _ANIME_RUSSIAN_NAME_ }}</h6>
                </div>
                <div class="characters-list-container">
                    <div class="character-content" v-for="character in _ANIME_CHARACTER_ROLES_" :key="character.id">
                        <div class="character-content-image">
                            <img :src="character.character.poster.mini2xUrl" :alt="character.character.name">
                        </div>
                        <p style="background: transparent">{{ character.character.russian }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            _ANIME_RUSSIAN_NAME_: null,
            _ANIME_CHARACTER_ROLES_: null,
        };
    },
    methods: {
        main() {
            const storedData = sessionStorage.getItem("CurrentAnime");
            if (storedData) {
                this._ANIME_RUSSIAN_NAME_ = JSON.parse(storedData)[0].russian;
                this._ANIME_CHARACTER_ROLES_ = JSON.parse(storedData)[0].characterRoles.filter(role => role.rolesEn.includes("Main"));
            }
        },
    }
};
</script>

<style lang="scss">
.characters-list {
    width: 100%;
}

ds
.characters-list .characters-list-inner {
    width: 100%;
    padding: 0 10px;
}

.characters-list .characters-list-tit {
    max-width: 1300px;
    width: 100%;
    margin: 0 auto;
}

.characters-list-tit .characters-list-title {
    margin-bottom: 5px;
}

.characters-list-tit .characters-list-title h6 {
    font-weight: normal;
    color: var(--characters-anime-title-h6-color);
}

.characters-list-tit .characters-list-container {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(12, minmax(80px, 1fr));
    gap: 10px;
    position: relative;
}

.characters-list-tit .characters-list-container::-webkit-scrollbar {
    height: 0;
}

.characters-list-container .character-content {
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.character-content .character-content-image {
    width: 100%;
    aspect-ratio: 1 / 1.5;
    background: var(--characters-anime-content-img-background-gradient);
    border-radius: 5px;
    position: relative;
    overflow: hidden;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.character-content .character-content-image img {
    width: 100%;
    position: absolute;
    height: 100%;
    pointer-events: none;
}

.character-content p {
    font-size: 0.9em;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-top: 10px;
    display: flex;
    height: 17px !important;
    border-radius: 5px;
    background: var(--characters-anime-content-p-background-color);
    justify-content: center;
    align-items: center;
}

@media screen and (max-width: 1140px) {
    .characters-list-tit .characters-list-container {
        grid-template-columns: repeat(10, minmax(80px, 1fr));
    }
}


@media screen and (max-width: 920px) {
    .characters-list-tit .characters-list-container {
        grid-template-columns: repeat(7, minmax(80px, 1fr));
    }
}

@media screen and (max-width: 768px) {
    .characters-list-tit .characters-list-container {
        grid-template-columns: repeat(6, minmax(80px, 1fr));
    }
}


@media screen and (max-width: 570px) {
    .characters-list-tit .characters-list-container {
        grid-template-columns: repeat(5, minmax(80px, 1fr));
    }
}

@media screen and (max-width: 500px) {
    .characters-list-tit .characters-list-container {
        grid-template-columns: repeat(4, minmax(80px, 1fr));
    }
}

@media screen and (max-width: 425px) {
    .characters-list-title h2 {
        display: none;
    }

    .characters-list-tit .characters-list-container {
        justify-content: space-evenly !important;
        gap: 5px;
    }

    .characters-list-title h6 {
        text-align: center;
    }
}

@media screen and (max-width: 370px) {
    .characters-list-tit .characters-list-container {
        grid-template-columns: repeat(3, minmax(80px, 1fr));
    }
}
</style>
