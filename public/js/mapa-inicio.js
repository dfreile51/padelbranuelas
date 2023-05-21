let map = L.map('map').setView([42.636944444444, -6.2080555555556], 11);

L.tileLayer('https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png?apikey=8fea5469271547bdaa2bc623555e4432', {
    maxZoom: 30,
    attribution: '&copy; <a href="https://www.thunderforest.com/terms/">ThunderForest</a>'
}).addTo(map);

L.marker([42.636944444444, -6.2080555555556], {
    title: 'Brañuelas',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/wrY2E9zv5oQ714rF8') });

L.marker([42.641627889470705, -6.102520269559614], {
    title: 'Culebros',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/AZtZbG8htZ2iB1n56') });

L.marker([42.59114036823017, -6.221941407662642], {
    title: 'Manzanal del Puerto',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/i8j4S8t76AETx2TQ7') });

L.marker([42.693244857440945, -6.124924675749322], {
    title: 'Nistoso',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/2M2VwKrNv6Qn827s8') });

L.marker([42.688956007116765, -6.146718221284226], {
    title: 'Tabladas',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/hJCKg7m8ztvEyytF6') });

L.marker([42.62015528377863, -6.150524911189017], {
    title: 'Valbuena de la Encomienda',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/LZp2c8oUTioLRAmL9') });

L.marker([42.68459290577651, -6.126322117532104], {
    title: 'Villar',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/Xnam7L5jny43Nb479') });

L.marker([42.637742680914364, -6.125992724319245], {
    title: 'Corús',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/8UjCLb8f2Qin3sgA8') });

L.marker([42.63774289107203, -6.1370333885939266], {
    title: 'Requejo',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/hEiuQZvjUH8CRCQG8') });

L.marker([42.60299591496541, -6.265884363731218], {
    title: 'La Silva',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/smkm5nhqhBVGehnL9') });

L.marker([42.5917536577448, -6.272273750876046], {
    title: 'Montealegre',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/qyhzyNUhPBQYeWQC8') });

L.marker([42.58860613995293, -6.194381517442561], {
    title: 'Ucedo',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/sY57Kyy3352L22oL9') });

L.marker([42.63494778774382, -6.16170066794377], {
    title: 'Villagatón',
    opacity: 1,
    draggable: false
}).addTo(map).on('click', () => { window.open('https://goo.gl/maps/PE1KHZo1U7TRcJmc8') });
