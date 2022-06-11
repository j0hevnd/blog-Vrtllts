let title = "Fáciles de leer, contenido interesante";
let siteHeader = document.querySelector('.title-p-entry');
let maquinaEscribir = str => {
    let arrayStr = str.split('');
    let i = 0;
    let printStr = setInterval( function () {     
        if (arrayStr[i] === ' ') {
            siteHeader.innerHTML += arrayStr[i];
            siteHeader.innerHTML += arrayStr[i+1];
            i+=2
        } else {
            siteHeader.innerHTML += arrayStr[i];
            i++;
        }
        if (i === arrayStr.length) {
            clearInterval(printStr);
            i = 0;
        }
    }, 200);
}

function start() {
    setTimeout(function() {
        maquinaEscribir(title);
      // Again
      start();
      // Every 3 sec
    }, 7000);
}
// Begins
// start();