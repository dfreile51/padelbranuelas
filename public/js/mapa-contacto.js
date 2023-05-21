let map = L.map('map', {
    scrollWheelZoom: false
}).setView([42.633870235804444, -6.2015155439241125], 16);

L.tileLayer('https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png?apikey=8fea5469271547bdaa2bc623555e4432', {
    maxZoom: 30,
    attribution: '&copy; <a href="https://www.thunderforest.com/terms/">ThunderForest</a>'
}).addTo(map);

L.marker([42.633870235804444, -6.2015155439241125], {
    title: 'Cancha de pádel',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/KupCUf2fJoN8MZW28') });
