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

    if(a.style.display === 'none' && b.style.display === 'none' && c.style.display === 'none') {
        a.style.display = 'table-row';
        b.style.display = 'table-row';
        c.style.display = 'table-row';
    } else if(a.style.display === 'table-row' && b.style.display === 'table-row' && c.style.display === 'table-row'){
        a.style.display = 'none';
        b.style.display = 'none';
        c.style.display = 'none';
    }

    if(d.className === 'fa-solid fa-chevron-down') {
        d.className = 'fa-solid fa-chevron-up';
    } else if(d.className === 'fa-solid fa-chevron-up'){
        d.className = 'fa-solid fa-chevron-down';
    }
};