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


