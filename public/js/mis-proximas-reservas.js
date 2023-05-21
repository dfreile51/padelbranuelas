let bookings = [];

let currentPageNew = 1;

let tableBookings = document.querySelector('.misreservas__proximas table');

let prevButton = document.querySelector('.misreservas__proximas .pagination-container #prev-button');
let nextButton = document.querySelector('.misreservas__proximas .pagination-container #next-button');
let paginationNumbers = document.querySelector('.misreservas__proximas #pagination-numbers');

if (tableBookings) window.addEventListener('DOMContentLoaded', renderBookingsTable);

if (nextButton && prevButton) {
    prevButton.addEventListener('click', () => {
        if (currentPageNew > 1) {
            currentPageNew--;
            renderBookingsTable();
        }
    });
    nextButton.addEventListener('click', () => {
        if ((currentPageNew * pageSize) < bookings.length) {
            currentPageNew++;
            renderBookingsTable();
        };
    });
}

function renderBookingsTable() {
    getBookingsPerUser();

    if (paginationNumbers) paginationNumbers.innerHTML = `<span>${currentPageNew} de ${numberOfPages(bookings)}`;

    if (prevButton) {
        if (currentPageNew === 1) {
            prevButton.classList.add('disabled');
            prevButton.setAttribute('disabled', true);
        } else {
            prevButton.classList.remove('disabled');
            prevButton.removeAttribute('disabled');
        }
    }

    if (nextButton) {
        if (currentPageNew === numberOfPages(bookings)) {
            nextButton.classList.add('disabled');
            nextButton.setAttribute('disabled', true);
        } else {
            nextButton.classList.remove('disabled');
            nextButton.removeAttribute('disabled');
        }
    }

    bookings.forEach((item, index) => {
        let start = (currentPageNew - 1) * pageSize;
        let end = currentPageNew * pageSize;
        item.setAttribute('style', 'display: none;');

        if (index >= start && index < end) item.removeAttribute('style');
    });
}

function getBookingsPerUser() {
    let trItems = document.querySelectorAll('.misreservas__proximas table tbody tr');
    bookings = [...trItems];
}
