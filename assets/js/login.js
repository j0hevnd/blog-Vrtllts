/** Login **/

let formLogin = document.getElementById('form_login');
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
                ${data.mgs}
                </div>
            `;
            setTimeout( () => {
                location.href = BASE_URL;
            }, 5000);
        } else {
            response.innerHTML = `
                <div class="alert-error">
                ${data.mgs}
                </div>
            `;
        }
        console.log(data);
    }).catch(console.log)
});