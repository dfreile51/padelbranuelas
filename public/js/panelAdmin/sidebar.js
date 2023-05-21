const toggleBtnIcon = document.querySelector('#interface .navigation .toggle-btn .material-symbols-outlined');
const toggleBtn = document.querySelector('#interface .navigation .toggle-btn');
const menu = document.querySelector('#menu');
const interface = document.querySelector('#interface');
const sombra = document.querySelector('#sombra');
const sidebarCloseBtn = document.querySelector('#menu .closebtn');

toggleBtn.addEventListener('click', () => {
    menu.setAttribute('style', 'width: 30rem');
    interface.setAttribute('style', 'margin-left: 30rem');
    document.getElementsByTagName('body')[0].classList.add('no-scroll');
    sombra.classList.remove('hidden');
    // toggleBtnIcon.textContent = 'close';
});

sidebarCloseBtn.addEventListener('click', () => {
    menu.removeAttribute('style');
    interface.removeAttribute('style');
    document.getElementsByTagName('body')[0].classList.remove('no-scroll');
    sombra.classList.add('hidden');
});
