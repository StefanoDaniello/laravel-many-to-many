import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// colletction di array di bottoni delete
const deleteSubmitButtons = document.querySelectorAll(".delete-button");
// tramite il forEach prendiamo tutti i bottoni delete e aggiungiamo l'event listener
deleteSubmitButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault();
        // prendiamo il valore dell'attributo data-item-title
        const dataTitle = button.getAttribute("data-item-title");
        // prendiamo la modal
        const modal = document.getElementById("deleteModal");

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();
        // impostiamo il titolo della modale con il valore del data-item-title
        const modalItemTitle = modal.querySelector("#modal-item-title");
        modalItemTitle.textContent = dataTitle;
        //prendiamo il bottone delete della modal
        const buttonDelete = modal.querySelector("button.btn-primary");
        // aggiungiamo l'event listener al bottone delete della modale
        buttonDelete.addEventListener("click", () => {
            button.parentElement.submit();
        });
    });
});

const arrow_left = document.querySelector(".fa-angle-left"); 
const other_pages = document.getElementById("other-pages");
other_pages.addEventListener("click", () => {
    arrow_left.classList.toggle("rotate");
});


const image = document.getElementById("upload_image");
if (image) {
    image.addEventListener("change", function () {
        // console.log(image.files[0]);
        // prendo l' elemento img dove voglio prendere la preview
        const preview = document.getElementById("uploadPreview");
        // creo nuovo elemento file reader
        const oFReader = new FileReader();
        // uso il metodo readAsDataURL per leggere l'immagine
        oFReader.readAsDataURL(image.files[0]);
        // al termine della lettura
        oFReader.onload = function (oFREvent) {
            // aggiungo l'immagine all'elemento upload_imageconst 
            preview.src = oFREvent.target.result;
        };
    });
}

const sidebar_toggle = document.getElementById("sidebar-toggle");
const wrapper = document.getElementById("wrapper");
const sidebar = document.getElementById("sidebar");
sidebar_toggle.addEventListener("click", () => {
    if (sidebar.classList.contains("small-sidebar")) {
        sidebar.classList.remove("small-sidebar");
        wrapper.classList.remove("big-wrapper");

    } else {
        sidebar.classList.add("small-sidebar");
        wrapper.classList.add("big-wrapper");
    }
})