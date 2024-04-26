let sidebarIsOpened = false;

function openSidenav() {
    let sidenav = document.querySelector(".my-sidenav");
    let body = document.body;
    if (sidebarIsOpened === false) {
        anime({
            targets: sidenav,
            left: ["-100%", 0],
            opacity: [0, 1],
            duration: 450,
            easing: "easeInOutExpo",
            begin: function () {
                console.log("Animation started => open sidenav <=");
                body.style.overflow = "hidden";
                sidebarIsOpened = true;
            },
        });
    } else {
        console.log("sik")
    }
}

function closeSidenav() {
    let sidenav = document.querySelector(".my-sidenav");
    let body = document.body;
    anime({
        targets: sidenav,
        left: [0, "-100"],
        opacity: [1, 0],
        duration: 450,
        easing: "easeInOutExpo",
        complete: function () {
            console.log("Animation Started =>  close sidenav <=");
            body.style.overflow = "auto";
            sidebarIsOpened = false;
        },
    });
}

document.getElementById("voice-selector").addEventListener("change", function() {
    const selectedVoice = this.value;
    console.log(selectedVoice)
    setCookie("selectedVoice", selectedVoice, 30);
});


const selectedVoice = getCookie("selectedVoice");
if (selectedVoice) {
    const voiceSelector = document.getElementById("voice-selector");
    const options = voiceSelector.options;
    for (let i = 0; i < options.length; i++) {
        if (options[i].value === selectedVoice) {
            options[i].selected = true;
            break;
        }
    }
}

