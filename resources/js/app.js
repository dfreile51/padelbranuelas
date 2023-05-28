import './bootstrap';
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

if (document.querySelector('#dropzone')) {
    const dropzone = new Dropzone('#dropzone', {
        dictDefaultMessage: 'Sube aquí tu imagen',
        acceptedFiles: ".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true,
        dictRemoveFile: 'Borrar Archivo',
        maxFiles: 1,
        uploadMultiple: false,

        // se ejecuta cuando la caja dropzone es iniciada, se ejecuta solo si el input con propiedad name="imagen" tiene un valor
        // Si se envia el formulario erroneamente, recupera la imagen con el value del input y agrega la imagen con el mismo nombre que esta en la ruta /torneos
        init: function () {
            if (document.querySelector('[name="imagen"]').value.trim()) {
                const imagenPublicada = {};
                imagenPublicada.size = 1234;
                imagenPublicada.name = document.querySelector('[name="imagen"]').value;

                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

                imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
            }
        }
    });
    // dropzone.on('sending', (file, xhr, formData) => {
    //     console.log(formData);
    // });

    dropzone.on('success', (file, response) => {
        document.querySelector('[name="imagen"]').value = response.imagen;
    });

    // dropzone.on('error', (file, message) => {
    //     console.log(message);
    // });

    dropzone.on('removedfile', () => {
        document.querySelector('[name="imagen"]').value = "";
        fetch('/imagenes/delete')
            .then(res => res.json())
            .then(data => console.log(data.mensaje));
    });
}

