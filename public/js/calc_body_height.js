const divBody = document.querySelector('#body');

window.addEventListener('load', calcHeight);

window.addEventListener('resize', calcHeight);

function calcHeight() {
    const headerHeight = document.querySelector('.header').getBoundingClientRect().height;
    const footerHeight = document.querySelector('.footer').getBoundingClientRect().height;

    divBody.style.minHeight = `calc(100vh - (${headerHeight}px + ${footerHeight}px))`;
}
