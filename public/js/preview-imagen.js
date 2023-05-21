const file = document.querySelector('#imagen');
const imagen = document.querySelector('#imagenPreview');

file.addEventListener('change', e => {
    if (e.target.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imagen.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
});
