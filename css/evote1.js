//alert("h");
const log1 = document.querySelector(".log");
const create1 = document.querySelector(".create");
const headd = document.querySelector(".headd");
const vote = document.querySelector(".votee");
const contt = document.querySelector(".contestant");
const help = document.querySelector(".help");

//......................................................

create1.style.display = 'none';
vote.style.display = 'none';
contt.style.display = 'none';
help.style.display = 'none';
//......................................................

function crt() {
    create1.style.display = 'initial';
    log1.style.display = 'none';
}

function back() {
    create1.style.display = 'none';
    log1.style.display = 'initial';
}

function voter() {
    headd.innerHTML = 'Vote';
    help.style.display = 'none';
    log1.style.display = 'none';
    contt.style.display = 'none';
    vote.style.display = 'initial';

}

function viewcont() {
    log1.style.display = 'none';
    headd.innerHTML = 'Contestants';
    vote.style.display = 'none';
    help.style.display = 'none';
    contt.style.display = 'initial';
}

function helpp() {
    log1.style.display = 'none';
    headd.innerHTML = 'Help';
    vote.style.display = 'none';
    contt.style.display = 'none';
    help.style.display = 'initial';

}

function homee() {
    log1.style.display = 'Initial';
    headd.innerHTML = 'Home';
    vote.style.display = 'none';
    contt.style.display = 'none';
    help.style.display = 'none';

}