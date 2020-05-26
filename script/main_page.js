window.addEventListener('load', function() {

    adler_div = document.getElementById('adler');
    billroth_div = document.getElementById('billroth');
    citygate_div = document.getElementById('citygate');
    hoffnung_div = document.getElementById('hoffnung');
    retz_div = document.getElementById('retz');
    wienerberg_div = document.getElementById('wienerberg');
    phönix_div = document.getElementById('phönix');
    kwizda_div = document.getElementById('kwizda');
    herba_div = document.getElementById('herba');

    adler_k = parseInt(document.getElementById('adler_k').innerText);
    billroth_k = parseInt(document.getElementById('billroth_k').innerText);
    citygate_k = parseInt(document.getElementById('citygate_k').innerText);
    hoffnung_k = parseInt(document.getElementById('hoffnung_k').innerText);
    retz_k = parseInt(document.getElementById('retz_k').innerText);
    wienerberg_k = parseInt(document.getElementById('wienerberg_k').innerText);
    phönix_k = parseInt(document.getElementById('phönix_k').innerText);
    kwizda_k = parseInt(document.getElementById('kwizda_k').innerText);
    herba_k = parseInt(document.getElementById('herba_k').innerText);

    adler_rest = parseInt(document.getElementById('adler_rest').innerText);
    billroth_rest = parseInt(document.getElementById('billroth_rest').innerText);
    citygate_rest = parseInt(document.getElementById('citygate_rest').innerText);
    hoffnung_rest = parseInt(document.getElementById('hoffnung_rest').innerText);
    retz_rest = parseInt(document.getElementById('retz_rest').innerText);
    wienerberg_rest = parseInt(document.getElementById('wienerberg_rest').innerText);
    phönix_rest = parseInt(document.getElementById('phönix_rest').innerText);
    kwizda_rest = parseInt(document.getElementById('kwizda_rest').innerText);
    herba_rest = parseInt(document.getElementById('herba_rest').innerText);

    if (adler_k == 0) {
        adler_div.classList.add("hide");
    }
    if (billroth_k == 0) {
        billroth_div.classList.add("hide");
    }
    if (citygate_k == 0) {
        citygate_div.classList.add("hide");
    }
    if (hoffnung_k == 0) {
        hoffnung_div.classList.add("hide");
    }
    if (retz_k == 0) {
        retz_div.classList.add("hide");
    }
    if (wienerberg_k == 0) {
        wienerberg_div.classList.add("hide");
    }
    if (phönix_k == 0) {
        phönix_div.classList.add("hide");
    }
    if (kwizda_k == 0) {
        kwizda_div.classList.add("hide");
    }
    if (herba_k == 0) {
        herba_div.classList.add("hide");
    }

    // *********************
    if (adler_rest == 0) {
        adler_div.classList.add("done");
    }
    if (billroth_rest == 0) {
        billroth_div.classList.add("done");
    }
    if (citygate_rest == 0) {
        citygate_div.classList.add("done");
    }
    if (hoffnung_rest == 0) {
        hoffnung_div.classList.add("done");
    }
    if (retz_rest == 0) {
        retz_div.classList.add("done");
    }
    if (wienerberg_rest == 0) {
        wienerberg_div.classList.add("done");
    }
    if (phönix_rest == 0) {
        phönix_div.classList.add("done");
    }
    if (kwizda_rest == 0) {
        kwizda_div.classList.add("done");
    }
    if (herba_rest == 0) {
        herba_div.classList.add("done");
    }

    // *********************
    if (adler_rest < 0) {
        adler_div.classList.add("over");
    }
    if (billroth_rest < 0) {
        billroth_div.classList.add("over");
    }
    if (citygate_rest < 0) {
        citygate_div.classList.add("over");
    }
    if (hoffnung_rest < 0) {
        hoffnung_div.classList.add("over");
    }
    if (retz_rest < 0) {
        retz_div.classList.add("over");
    }
    if (wienerberg_rest < 0) {
        wienerberg_div.classList.add("over");
    }
    if (phönix_rest < 0) {
        phönix_div.classList.add("over");
    }
    if (kwizda_rest < 0) {
        kwizda_div.classList.add("over");
    }
    if (herba_rest < 0) {
        herba_div.classList.add("over");
    }
});