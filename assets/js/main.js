let title = "Fácil lectura, contenido interesante            ";
let siteHeader = document.querySelector('.title-p-entry');
let typewrite = str => {
    let arrayStr = str.split('');
    let i = 0;
    let printStr = setInterval(function () {
        if (arrayStr[i] === ' ') {
            siteHeader.innerHTML += arrayStr[i];
            siteHeader.innerHTML += arrayStr[i + 1];
            i += 2
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

/* Abrir el modal y hacer scroll haci arriba */
function openModal() {
    modal.style.display = 'flex';
    let scrollModal = window.pageYOffset;
    if (scrollModal > 100) {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    };
}

function modalClose() {
    modal.style.display = 'none';
};


const BASE_URL = 'http://localhost/prueba-virtualLlantas/blog-Vrtllts/';
let modal = document.querySelector('.modal');
let formModal = document.getElementById('form_modal');
let buttonEdit = document.querySelectorAll('.button_edit');
let response_modal = document.getElementById('response_modal');
let title_modal = document.querySelector('.title_modal');
let button_modal = document.querySelector('.button_modal');


/**
 * Agregar contenido 
 */
formModal.addEventListener('submit', function (e) {
    e.preventDefault();
    let modalData = new FormData(formModal);
    let url_send = '';

    if (button_modal.value) {
        url_send = `${BASE_URL}api/article/edit/${button_modal.value}`;
    } else {
        url_send = `${BASE_URL}api/article/addArticle`;
    }
    console.log(url_send);
    console.log(modalData);
    fetch(url_send, {
        method: 'POST',
        body: modalData
    })
    .then(res => res.json())
    .then((data) => {
        if (button_modal.value) {  
            response_modal.innerHTML = `
            <div class="alert-succes">
            Actualizado correctamente
            </div>`;
            console.log(data);
        } else {
            if (data.addArticle) {
                response_modal.innerHTML = `
                <div class="alert-succes">
                ${data.msg}
                </div>
            `;
            } else {
                response_modal.innerHTML = `
                <div class="alert-error">
                ${data.msg}
                </div>
            `;
            }
            console.log(data);
        }

    }).catch(console.log);

});


function findPostById(element){
    let id = element.value;
    /**
     * taer los datos a actualizar
     */
    fetch(`${BASE_URL}api/article/find/${id}`, {
        method: 'GET'
    })
    .then(res => res.json())
    .then((data) => {

        let titulo = document.querySelector('.title');
        let email = document.querySelector('.email');
        let content = document.querySelector('.content');

        title_modal.innerHTML = `Editar: ${data.titulo}`;
        button_modal.innerHTML = 'Actualizar';
        button_modal.value = data.id;
        titulo.value = data.titulo;
        email.value = data.email_usuario;
        content.value = data.contenido;
    });
    
    openModal();
}


function deletePostById(element){
    let id = element.value;
    let label = document.getElementById(element.id).parentElement.parentElement.parentElement.parentElement.id;
    document.getElementById(label).remove();
    /**
     * taer los datos a actualizar
     */
    fetch(`${BASE_URL}api/article/deleteArticle&id=${id}`, {
        method: 'POST'
    })
    .then(res => res.json())
    .then((data) => {
        console.log(data);
    });
    
}
