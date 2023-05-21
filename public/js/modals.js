// Elementos de la ventana modal
const modal = document.querySelector('#myModal');
const modalTitle = document.querySelector('#myModal .modal-content .modal-header h3');
const modalBody = document.querySelector('#myModal .modal-content .modal-body span');
const closeModal = document.querySelector('.close');
const body = document.getElementsByTagName('body')[0];
const form = document.querySelector('#modal-form');
const modalButton = document.querySelector('#modal-form input[type="submit"]');

function showModal(e, type) {
    let title = "";
    let message = "";
    let buttonText = "";

    if (type === "user") {
        title = "Eliminar usuario";
        message = `¿Seguro que quieres eliminar al usuario ${e.target.dataset.userName}?`;
        buttonText = "Eliminar";
    } else if (type === "eliminarReserva") {
        title = "Eliminar Reserva";
        message = `¿Seguro que quieres eliminar la reserva número ${e.target.dataset.id}?`;
        buttonText = "Eliminar";
    } else if (type === "cancelarReserva") {
        title = "Cancelar Reserva";
        message = `¿Seguro que quieres cancelar la reserva?`;
        buttonText = "Cancelar";
    } else if (type === "eliminarComentario") {
        title = "Eliminar Comentario";
        message = `¿Seguro que quieres eliminar el comentario?`;
        buttonText = "Eliminar";
    } else if (type === "eliminarTorneo") {
        title = "Eliminar Torneo";
        message = `¿Seguro que quieres eliminar el torneo?`;
        buttonText = "Eliminar";
    }

    modalTitle.textContent = title;
    modalBody.textContent = message;
    modalButton.setAttribute('value', buttonText);
    form.action = window.location + `/${e.target.dataset.id}`;
    modal.classList.remove('hidden');
    body.classList.add('no-scroll');
}

closeModal.addEventListener('click', () => {
    modal.classList.add('hidden');
    body.classList.remove('no-scroll');
});
