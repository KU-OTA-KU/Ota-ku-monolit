<section class="player" name="watch">
    <div class="player-inner">
        <div class="player-tit">
            <div class="player-container">
                <div id="kodik-player">
                    <iframe src="" width="100%"
                            height="100%" frameborder="0" AllowFullScreen allow="autoplay *; fullscreen *"></iframe>
                </div>
            </div>
            <div class="player-right-panel">
                <div class="ozvucka-or-player">
                    <button class="player-buttons active" id="seasons-button" onclick="selectSeasons()"><i
                                class="fa-solid fa-film"></i>Серии
                    </button>
                    <button class="player-buttons" id="voices-button" onclick="selectVoices()"><i
                                class="fa-solid fa-microphone"></i>Озвучка
                    </button>
                </div>
                <div class="player-right-panel-content">
                    <div class="voices-and-subtitles-container"></div>
                    <div class="seasons-container"></div>
                </div>
            </div>
        </div>
    </div>
</section>