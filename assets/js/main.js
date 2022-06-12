let title = "Fácil lectura, contenido interesante            ";
let siteHeader = document.querySelector('.title-p-entry');
let typewrite = str => {
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
            // clearInterval(printStr);
            siteHeader.innerHTML = '';
            i = 0;
        }
    }, 200);
}

typewrite(title);

// Modal

let modal = document.querySelector('.modal');

function modalOpen() {
    modal.style.display = 'flex';
    let scrollModal = window.pageYOffset;
    if (scrollModal > 100) {
    window.scrollTo({
        top:0,
        behavior: 'smooth'
    })
    };
};

function modalClose() {
    modal.style.display = 'none';
};