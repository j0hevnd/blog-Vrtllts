/** Login **/

let formLogin = document.getElementById('form_login');
let formLoginInput = document.querySelectorAll('#form_login input');
let response = document.getElementById('response');
const BASE_URL = 'http://localhost/prueba-virtualLlantas/blog-Vrtllts/';



formLogin.addEventListener('submit', function (e) {
    e.preventDefault();
    
    let data = new FormData(formLogin); // accedemos a los datos del formulario

    fetch(`${BASE_URL}api/user/login`, {
        method: 'POST',
        body: data
    })
    .then(res => res.json())
    .then((data) => {
        if (data.login) {
            response.innerHTML = `
                <div class="alert-succes">
                ${data.msg}
                </div>
            `;

            formLoginInput[0].style.boxShadow = '2px 1px 4px 1px rgba(14, 181, 0, 0.8)';
            formLoginInput[1].style.boxShadow = '2px 1px 4px 1px rgba(14, 181, 0, 0.8)';
            setTimeout( () => {
                location.href = BASE_URL;
            }, 1500);
        } else {
            response.innerHTML = `
                <div class="alert-error">
                ${data.msg}
                </div>
            `;
            formLoginInput[0].style.boxShadow = '2px 1px 4px 1px rgba(253, 0, 0, 0.80)';
            formLoginInput[1].style.boxShadow = '2px 1px 4px 1px rgba(253, 0, 0, 0.80)';
        }
    }).catch(console.log)
});
