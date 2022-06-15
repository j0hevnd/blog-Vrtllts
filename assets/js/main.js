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
let articles_list = document.getElementById('articles_list');
let title_modal = document.querySelector('.title_modal');
let button_modal = document.querySelector('.button_modal');


/**
 * Agregar contenido 
 */

function openAdd() {
    button_modal.setAttribute('value', 'add');
    document.querySelector('.title_modal').innerHTML = 'Ingresa una nueva entrada';
    formModal.reset();
    openModal()
}

function addEntry(data) {
    response_modal.innerHTML = `
        <div class="alert-succes">
            ${data.msg}
        </div>
    `;
    if (data.editEntry instanceof Object) {
        // construir etiqueta
        let new_article = document.createElement('article');
        new_article.className = "container entry-blog";
        new_article.id = `entry_blog_${data.article.id}`;

        //  contruir HTML
        new_article.innerHTML = `
            <div class="content-blog">
                <img src="${BASE_URL}uploads/images/${data.article.imagen}" class="image-article" alt="imagen">
                <div class="card">
                    <h2 class="title-blog">${data.article.titulo}</h2>
                    <p class="paragraph-blog">${data.article.contenido}</p>
                    <p class="date">Publicado: ${data.article.fecha}></p>
                </div>
            </div>
        `;

        // agregar al html
        articles_list.appendChild(new_article);
        formModal.reset();
    }
}

/**
 * editar contenido
 */
 function editEntry(data) {
    response_modal.innerHTML = `
        <div class="alert-succes">
            ${data.msg}
        </div>
    `;
    if (data.editEntry instanceof Object) {
        document.querySelector('.title_modal').innerHTML = `Editar: ${data.editEntry.titulo}`;
        document.querySelector('.image-article').src = `${BASE_URL}uploads/images/${data.editEntry.imagen}`;
        document.querySelector('.title-blog').innerHTML = data.editEntry.titulo;
        document.querySelector('.paragraph-blog').innerHTML = data.editEntry.contenido;
    
        // formModal.reset();        
    }
}


formModal.addEventListener('submit', function (e) {
    e.preventDefault();
    let modalData = new FormData(formModal);
    let url_send = '';

    if (!isNaN(button_modal.value)) {
        url_send = `${BASE_URL}api/article/edit/${button_modal.value}`;
    } else {
        url_send = `${BASE_URL}api/article/addArticle`;
    }

    fetch(url_send, {
        method: 'POST',
        body: modalData
    })
    .then(res => res.json())
    .then((data) => {
        if (button_modal.value) {
            
            editEntry(data);
            
        } else if (data.article) {

            addEntry(data)

        } else {
            response_modal.innerHTML = `
                <div class="alert-error">
                    ${data.msg}
                </div>
            `;
        }

    }).catch(console.log);

});


/**
 * taer los datos a actualizar, con estos llenamos el modal
 */
function findPostById(element){
    let id = element.value;

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

/**
 * Eliminar un elemento y removerlo del HTML
 */
function deletePostById(element){
    let id = element.value;
    let label = document.getElementById(element.id).parentElement.parentElement.parentElement.parentElement.id;

    fetch(`${BASE_URL}api/article/deleteArticle&id=${id}`, {
        method: 'POST'
    })
    .then(res => res.json())
    .then((data) => {
        document.getElementById(label).remove();
    });
    
}
