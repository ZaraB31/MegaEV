function openForm() {
    var x = document.getElementById('hiddenForm');
    x.style.display = "block";
}

function closeForm() {
    var x = document.getElementById('hiddenForm');
    x.style.display = "none";
}
function openSecondForm() {
    var x = document.getElementById('secondHiddenForm');
    x.style.display = "block";
}

function closeSecondForm() {
    var x = document.getElementById('secondHiddenForm');
    x.style.display = "none";
}


function error() {
    var x = document.getElementById('errorAlert').style.display;
    var y = document.getElementById('hiddenForm');

    if (x === "block") {
        y.style.display = "block";
    }
    else {
        y.style.display = "block";
    }
}