// document hacer referencia a el html
// addEventListener va a ejecutar un evento cunado se cumplan ciertos parametros
// DOMContentLoaded va a ejecutar el addEventListener cuando tod el html este cargado 
// Va a ejecutar una funcion en este caso las que ves llamando
document.addEventListener('DOMContentLoaded', function(){
    // Llamamos a las funciones
    eventListeners();
    darkMode();
});

function darkMode() {
    // Para añadir dark mode de manera automatica o desde el sistema de el ordenador
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    })

    // Para añadir dark mode con el boton
    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    })
}

function eventListeners() {
    // Creamos una variable que hacer referencia a html y seleccionamos la clase .mobile-menu como si la seleccionamos en css
    const mobileMenu = document.querySelector('.mobile-menu');

    // Ejecutamos un addEvent con un evento de click que ejcute la función que le pasamos
    mobileMenu.addEventListener('click', navegacionResponsive)
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    // Este iterador va agregar o quitar la clase de mostrar cada vez que hagamos click
    if(navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');
    }

    // Hace los mismo que el iterador, pero en una sola linea
    // navegacion.classList.toggle('mostrar');
}