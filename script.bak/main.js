function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('check')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
})
}

function closeWindow() {
    window.open('','_parent','');
    window.close();
}

function dirLinkedin() {
    window.location.href = "https://www.linkedin.com/in/la-capsule-9ba316205/?originalSubdomain=fr";
}
function dirGithub() {
    window.location.href = "https://github.com/lacapsule?tab=repositories";
}
function dirDiscord() {
    window.location.href = "https://discord.com/invite/7SAwbWC6ab";
}
