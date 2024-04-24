let sidebarIsOpened = false;

function openSidenav() {
    let sidenav = document.querySelector(".my-sidenav");
    let body = document.body;
    if (sidebarIsOpened === false) {
        anime({
            targets: sidenav,
            left: ["-100%", 0],
            opacity: [0, 1],
            duration: 250,
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
        duration: 250,
        easing: "easeInOutExpo",
        complete: function () {
            console.log("Animation Started =>  close sidenav <=");
            body.style.overflow = "auto";
            sidebarIsOpened = false;
        },
    });
}