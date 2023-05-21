const toggleBtn = document.querySelector('.toggle-btn');
const toggleBtnIcon = document.querySelector('.material-symbols-outlined');
const dropDownMenu = document.querySelector('.dropdown-menu');
const sliderBtns = document.querySelector('.slider__btn');
const imagenPerfil1 = document.querySelector('.contenido-header .botones-header .imagen-perfil');
const imagenPerfil2 = document.querySelector('.dropdown-menu .botones-header .imagen-perfil');
const perfilButtons = document.querySelector('.perfil-buttons');
const dropDownMenuPerfil = document.querySelector('.dropdown-perfil');

/* QUITA Y AÑADE LA CLASE OPEN, PARA ABRIR Y CERRAR EL MENU DESPLEGABLE
ADEMÁS QUITA LOS BOTONES DEL SLIDER PARA QUE NO SE SUPERPONGAN*/
toggleBtn.addEventListener('click', () => {
    dropDownMenu.classList.toggle('hidden');

    const isOpen = !dropDownMenu.classList.contains('hidden');

    toggleBtnIcon.innerText = isOpen ? 'close' : 'menu';
});

if (imagenPerfil1) {
    imagenPerfil1.addEventListener('click', () => {
        dropDownMenuPerfil.classList.toggle('hidden');
    });
}

if (imagenPerfil2) {
    imagenPerfil2.addEventListener('click', () => {
        perfilButtons.getAttribute('style') ? perfilButtons.removeAttribute('style') : perfilButtons.setAttribute('style', 'display: none;');
    });
}
