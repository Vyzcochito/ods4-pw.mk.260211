
let usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];
let publicaciones = JSON.parse(localStorage.getItem("publicaciones")) || [];
let usuarioActivo = JSON.parse(localStorage.getItem("usuarioActivo"));

window.onload = () => {
    if (usuarioActivo) mostrarComunidad();
    mostrarPosts();
};

function mostrarRegistro() {
    document.getElementById('login-section').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
}

function mostrarLogin() {
    document.getElementById('register-form').style.display = 'none';
    document.getElementById('login-section').style.display = 'block';
}

function registrar() {
    const nombre = document.getElementById('nombre').value.trim();
    const correo = document.getElementById('correo').value.trim();
    const apodo = document.getElementById('apodo').value.trim();
    const password = document.getElementById('reg-password').value.trim();

    if (!nombre || !correo || !apodo || !password) {
    alert('Por favor, completa todos los campos.');
    return;
    }

    if (usuarios.some(u => u.correo === correo || u.apodo === apodo)) {
    alert('El correo o el apodo ya están registrados.');
    return;
    }

    usuarios.push({ nombre, correo, apodo, password });
    localStorage.setItem("usuarios", JSON.stringify(usuarios));
    alert('Registro exitoso. ¡Bienvenido/a, ' + apodo + '!');
    mostrarLogin();
}

function login() {
    const apodo = document.getElementById('login-username').value.trim();
    const password = document.getElementById('login-password').value.trim();

    const user = usuarios.find(u => u.apodo === apodo && u.password === password);
    if (user) {
    usuarioActivo = user;
    localStorage.setItem("usuarioActivo", JSON.stringify(usuarioActivo));
    mostrarComunidad();
    } else {
    alert('Apodo o contraseña incorrectos.');
    }
}

function mostrarComunidad() {
    document.getElementById('login-section').style.display = 'none';
    document.getElementById('register-form').style.display = 'none';
    document.getElementById('community-section').style.display = 'block';
    mostrarPosts();
}

function cerrarSesion() {
    alert('Hasta pronto, ' + usuarioActivo.apodo + ' 👋');
    localStorage.removeItem("usuarioActivo");
    usuarioActivo = null;
    document.getElementById('community-section').style.display = 'none';
    document.getElementById('login-section').style.display = 'block';
}

function publicar() {
    const postText = document.getElementById('postText').value.trim();
    if (postText === '') {
    alert('Escribe algo antes de publicar.');
    return;
    }

    const nuevaPublicacion = {
    apodo: usuarioActivo.apodo,
    texto: postText,
    fecha: new Date().toLocaleString()
    };

    publicaciones.unshift(nuevaPublicacion);
    localStorage.setItem("publicaciones", JSON.stringify(publicaciones));
    document.getElementById('postText').value = '';
    mostrarPosts();
}

function mostrarPosts() {
    const contenedor = document.getElementById('posts');
    contenedor.innerHTML = '';
    publicaciones.forEach(pub => {
    const post = document.createElement('div');
    post.classList.add('post');
    post.innerHTML = `
        <strong>${pub.apodo}</strong>: ${pub.texto}
        <small>${pub.fecha}</small>
    `;
    contenedor.appendChild(post);
    });
}