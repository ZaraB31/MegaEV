function editTag(id) {
    var x = document.getElementById(id);

    if (x.className === 'hidden') {
        x.className += ' open';
    } else {
        x.className = 'hidden';
    }
}