function openMenu() {
    var x = document.getElementById('hamburger');
    var y = document.getElementById('menu');

    if (y.className === 'menu') {
        y.className += ' open';
        x.className += ' active';
    } else {
        y.className = 'menu';
        x.className = 'hamburger';
    }
}