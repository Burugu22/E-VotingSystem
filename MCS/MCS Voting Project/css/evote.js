//alert("h");
const log1 = document.querySelector(".log");
const create1 = document.querySelector(".create");
const headd = document.querySelector(".headd");
const vote = document.querySelector(".votee");
const contt = document.querySelector(".contestant");
const conttv = document.querySelector(".contestantvote");
const help = document.querySelector(".help");
const vot = document.querySelector(".vot");

const pname = document.querySelector(".pname");
const pparty = document.querySelector(".pparty");

const gname = document.querySelector(".gname");
const gparty = document.querySelector(".gparty");

const sname = document.querySelector(".sname");
const sparty = document.querySelector(".sparty");

const mname = document.querySelector(".mname");
const mparty = document.querySelector(".mparty");

//......................................................

create1.style.display = 'none';
vote.style.display = 'none';
contt.style.display = 'none';
help.style.display = 'none';
vot.style.display = 'none';
conttv.style.display = 'none';

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

function backn() {
    log1.style.display = 'Initial';
    headd.innerHTML = 'Home';
    vote.style.display = 'none';
    contt.style.display = 'none';
    help.style.display = 'none';
}

function checkvote() {
    log1.style.display = 'none';
    headd.innerHTML = 'Confirm Vote';
    vote.style.display = 'none';
    contt.style.display = 'none';
    help.style.display = 'none';
    conttv.style.display = 'initial';
    vot.style.display = 'initial';
    var pqq = 0,
        gq = 0,
        sq = 0,
        mq = 0;

    var p = 1;
    for (var i = 0; i <= 3; i++) {

        if (document.getElementById(`pp${p}`).checked) {

            pname.innerHTML = document.getElementById(`pp${p}`).value;
            pparty.innerHTML = document.getElementById(`ppp${p}`).value;
        } else {
            pqq++;
        }

        if (document.getElementById(`gg${p}`).checked) {

            gname.innerHTML = document.getElementById(`gg${p}`).value;
            gparty.innerHTML = document.getElementById(`ggp${p}`).value;
        } else {
            gq++;
        }

        if (document.getElementById(`ss${p}`).checked) {

            sname.innerHTML = document.getElementById(`ss${p}`).value;
            sparty.innerHTML = document.getElementById(`ssp${p}`).value;
        } else {
            sq++;
        }

        if (document.getElementById(`mp${p}`).checked) {

            mname.innerHTML = document.getElementById(`mp${p}`).value;
            mparty.innerHTML = document.getElementById(`mpp${p}`).value;
        } else {
            mq++;
        }


        p++;
        if (pqq >= 4 || gq >= 2 || sq >= 2 || mq >= 2) {
            alert("Please vote for all candidates to continue");
            back1();
            break;
        }
    }


}

function back1() {
    log1.style.display = 'none';
    headd.innerHTML = 'Vote';
    vote.style.display = 'initial';
    contt.style.display = 'none';
    help.style.display = 'none';
    conttv.style.display = 'none';
    conttv.style.display = 'none';
}