let oldBookings = [];

let currentPageOld = 1;

let tableOldBookings = document.querySelector('.misreservas__anteriores table');

let prevButtonOld = document.querySelector('.misreservas__anteriores .pagination-container #prev-button');
let nextButtonOld = document.querySelector('.misreservas__anteriores .pagination-container #next-button');
let paginationNumbersOld = document.querySelector('.misreservas__anteriores #pagination-numbers');

if (tableOldBookings) window.addEventListener('DOMContentLoaded', renderOldBookingsTable);

if (prevButtonOld && nextButtonOld) {
    prevButtonOld.addEventListener('click', () => {
        if (currentPageOld > 1) {
            currentPageOld--;
            renderOldBookingsTable();
        }
    });
    nextButtonOld.addEventListener('click', () => {
        if((currentPageOld * pageSize) < oldBookings.length) {
            currentPageOld++;
            renderOldBookingsTable()
        }
    });
}

function renderOldBookingsTable() {
    getOldBookingsPerUser();

    if (paginationNumbersOld) paginationNumbersOld.innerHTML = `<span>${currentPageOld} de ${numberOfPages(oldBookings)}</span>`;

    if (prevButtonOld) {
        if (currentPageOld === 1) {
            prevButtonOld.classList.add('disabled');
            prevButtonOld.setAttribute('disabled', true);

        } else {
            prevButtonOld.classList.remove('disabled');
            prevButtonOld.removeAttribute('disabled');
        }
    }

    if (nextButtonOld) {
        if (currentPageOld === numberOfPages(oldBookings)) {
            nextButtonOld.classList.add('disabled');
            nextButtonOld.setAttribute('disabled', true);
        } else {
            nextButtonOld.classList.remove('disabled');
            nextButtonOld.removeAttribute('disabled');
        }
    }

    // Crear la tabla HTML
    oldBookings.forEach((item, index) => {
        let start = (currentPageOld - 1) * pageSize;
        let end = currentPageOld * pageSize;
        item.setAttribute('style', 'display: none;');

        if (index >= start && index < end) item.removeAttribute('style');;
    });
}


function getOldBookingsPerUser() {
    let trItemsOld = document.querySelectorAll('.misreservas__anteriores table tbody tr');
    oldBookings = [...trItemsOld];
}
