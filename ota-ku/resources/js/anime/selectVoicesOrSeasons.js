function selectSeasons() {
    let voicesContainer = document.querySelector('.voices-and-subtitles-container');
    let seasonsContainer = document.querySelector('.seasons-container');
    seasonsContainer.style.display = 'flex';
    voicesContainer.style.display = 'none';

    document.getElementById('seasons-button').classList.add('active');
    document.getElementById('voices-button').classList.remove('active');
}

function selectVoices() {
    let voicesContainer = document.querySelector('.voices-and-subtitles-container');
    let seasonsContainer = document.querySelector('.seasons-container');
    voicesContainer.style.display = 'flex';
    seasonsContainer.style.display = 'none';

    document.getElementById('voices-button').classList.add('active');
    document.getElementById('seasons-button').classList.remove('active');
}
