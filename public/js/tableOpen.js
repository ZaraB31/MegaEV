function tableOpen(name) {
    var x = name + '.name';
    var y = name + '.email';
    var z = name + '.message';
    var i = name + ' icon';

    console.log(x, y, z);
    var a = document.getElementById(x);
    var b = document.getElementById(y);
    var c = document.getElementById(z);
    var d = document.getElementById(i);

    if(a.className === 'hidden') {
        a.className += ' open';
    } else {
        a.className = 'hidden';
    }

    if(b.className === 'hidden') {
        b.className += ' open';
    } else {
        b.className = 'hidden';
    }

    if(c.className === 'hidden') {
        c.className += ' open';
    } else {
        c.className = 'hidden';
    }

    if(d.className === 'fa-solid fa-chevron-down') {
        d.className += ' animate';
    } else {
        d.className = 'fa-solid fa-chevron-down';
    }
};