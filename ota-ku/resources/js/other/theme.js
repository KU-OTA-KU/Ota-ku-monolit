document.addEventListener('DOMContentLoaded', function () {
    const themeSelector = document.querySelector('#theme-selector');
    const themeLink = document.querySelector('.theme-link');

    themeSelector.addEventListener('change', function () {
        const selectedTheme = themeSelector.value;
        themeLink.href = `css/palette/${selectedTheme}.css`;
        setCookie("selectedTheme", selectedTheme, 30);
    });
});

const selectedTheme = getCookie("selectedTheme");
if (selectedTheme) {
    console.log(selectedTheme)
    const voiceSelector = document.getElementById("theme-selector");
    const options = voiceSelector.options;
    for (let i = 0; i < options.length; i++) {
        if (options[i].value === selectedTheme) {
            options[i].selected = true;
            break;
        }
    }
}
