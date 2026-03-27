let usuarioActivo = null;
// 🔷 Cargar posts al iniciar
window.onload = () => {
    mostrarPosts();
};

// 🔷 UI
function mostrarRegistro() {
    document.getElementById('login-section').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
}

function mostrarLogin() {
    document.getElementById('register-form').style.display = 'none';
    document.getElementById('login-section').style.display = 'block';
}

// 🔷 REGISTRO
async function registrar() {
    const formData = new FormData();
    formData.append('accion', 'registro');
    formData.append('nombre', document.getElementById('nombre').value);
    formData.append('correo', document.getElementById('correo').value);
    formData.append('apodo', document.getElementById('apodo').value);
    formData.append('password', document.getElementById('reg-password').value);

    const response = await fetch('/ods4-pw.mk.260211/app/controllers/usersController.php', {
        method: 'POST',
        body: formData
    });

    const data = await response.json();

    if (data.success) {
        alert('Registro exitoso');
        mostrarLogin();
    } else {
        alert(data.message || 'Error al registrar');
    }
}

// 🔷 LOGIN
async function login() {
    const apodo = document.getElementById('login-username').value;
    const password = document.getElementById('login-password').value;

    const formData = new FormData();
    formData.append('accion', 'login');
    formData.append('apodo', apodo);
    formData.append('password', password);

    const response = await fetch('/ods4-pw.mk.260211/app/controllers/usersController.php', {
        method: 'POST',
        body: formData
    });

    const data = await response.json();

    console.log(data); // 🔍 DEBUG

    if (data.success) {
        usuarioActivo = data.usuario;
        localStorage.setItem("usuarioActivo", JSON.stringify(usuarioActivo));
        mostrarComunidad();
    } else {
        alert('Credenciales incorrectas');
    }
}

// 🔷 MOSTRAR COMUNIDAD
function mostrarComunidad() {
    document.getElementById('login-section').style.display = 'none';
    document.getElementById('register-form').style.display = 'none';
    document.getElementById('community-section').style.display = 'block';

    mostrarPosts();
}

// 🔷 LOGOUT
function cerrarSesion() {
    if (usuarioActivo) {
        alert('Hasta pronto, ' + usuarioActivo.apodo + ' 👋');
    }

    usuarioActivo = null;
    localStorage.removeItem("usuarioActivo");

    document.getElementById('community-section').style.display = 'none';
    document.getElementById('login-section').style.display = 'block';
}

// 🔷 PUBLICAR
async function publicar() {
    
    const texto = document.getElementById('postText').value.trim();

    if (!texto) {
        alert('Escribe algo');
        return;
    }

    if (!usuarioActivo) {
        alert('Debes iniciar sesión');
        return;
    }

    const formData = new FormData();
    formData.append('accion', 'crear');
    formData.append('texto', texto);
    formData.append('usuario_id', usuarioActivo.id);

    const response = await fetch('/ods4-pw.mk.260211/app/controllers/publicacionesController.php', {
        method: 'POST',
        body: formData
    });

    const text = await response.text(); 

    if (data.success) {
        document.getElementById('postText').value = '';
        mostrarPosts();
    } else {
        alert('Error al publicar');
    }
}

// 🔷 OBTENER POSTS
async function mostrarPosts() {
    const formData = new FormData();
    formData.append('accion', 'listar');

    const response = await fetch('/ods4-pw.mk.260211/app/controllers/publicacionesController.php', {
        method: 'POST',
        body: formData
    });

    const publicaciones = await response.json(); // ← regresamos a JSON

    const contenedor = document.getElementById('posts');
    contenedor.innerHTML = '';

    publicaciones.forEach(pub => {
        contenedor.innerHTML += `
            <div class="post">
                <strong>${pub.apodo}</strong>: ${pub.texto}
                <small>${pub.fecha}</small>
            </div>
        `;
    });
}