import { calcDate, calcHour } from './calc-dates-hours.js';

const btnReservar = document.querySelector('input[value="Reservar"]');
const spans = document.querySelectorAll('.reservas__form--hora span');
const date = document.querySelector('input[type="date"]');
const currentTime = new Date();

let divSuccess = document.querySelector('.success');
let messageSucess = document.querySelector('.success .mensaje');
let divError = document.querySelector('.error');
let messageError = document.querySelector('.error .mensaje');

let bookings = [];
let arraySpans = [...spans];

date.addEventListener('change', () => {
    arraySpans.forEach(element => {
        element.classList.remove('disabled');
        element.classList.remove('active');
    });
    getBookings();
});
arraySpans.forEach(span => {
    span.addEventListener('click', selectTime);
});
btnReservar.addEventListener('click', insertBooking);

window.addEventListener('DOMContentLoaded', getBookings);


function selectTime(e) {
    if (!e.target.classList.contains('disabled')) {
        e.target.classList.toggle('active');
    }
}

function insertBooking(e) {
    e.preventDefault();

    const hours = document.querySelectorAll('.active');
    const token = localStorage.getItem('token');
    const email = localStorage.getItem('email');

    if (date.value === "" || hours.length <= 0) {
        messageError.textContent = 'Debe indicar la fecha y la hora';
        divError.removeAttribute('style');
    }

    const arrayHours = [...hours];

    arrayHours.forEach(element => {
        let datos = {
            "fecha": date.value,
            "hora": element.textContent,
            "user_id": localStorage.getItem('user_id')
        };

        fetch(`${location.origin}/api/reservas/insert?email=${email}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `${token}`
            },
            body: JSON.stringify(datos)
        }).then(response => {
            return response.json();
        }).then(data => {
            if (data['status']) {
                messageSucess.textContent = `${data['message']}`;
                divSuccess.removeAttribute('style');
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } else {
                messageError.textContent = data['message'];
                divError.removeAttribute('style');
            }
        })
    });
}

function getBookings() {
    arraySpans.forEach(span => {
        if (date.value === calcDate(currentTime.toLocaleDateString()) && span.textContent <= calcHour(currentTime.toLocaleTimeString())) {
            span.classList.add('disabled');
        } else {
            if (span.classList.contains('disabled')) {
                span.classList.remove('disabled');
            }
        }
    });

    fetch(`${location.origin}/api/reservas/get`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    }).then(response => {
        return response.json();
    }).then(data => {
        if (data.length > 0) {
            bookings = [...data];

            bookings.forEach(booking => {
                if (booking.fecha === date.value) {
                    arraySpans.some(span => span.textContent === booking.hora.substring(0, 5) ? span.classList.add('disabled') : '')
                }
            });
        }
    })
}
