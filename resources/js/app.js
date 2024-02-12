import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

// modale
const btn = document.querySelectorAll(".cancel-btn");
btn.forEach((button) => {
    button.addEventListener("click", (event) => {
        //non invio form
        event.preventDefault();

        //prendo titolo progetto dal cancel button
        const dataTitle = button.getAttribute("data-item-title");

        //prendo modal
        const modal = document.getElementById("removeModal");

        //creo e mostro modal
        const myModal = new bootstrap.Modal(modal);
        myModal.show();

        //inserisco titolo progetto nel modal
        const title = modal.querySelector("#modal-item-title");
        title.innerHTML = dataTitle;

        //invio form
        const btnRemove = modal.querySelector("button.btn-danger");
        btnRemove.addEventListener("click", (event) => {
            button.parentElement.submit();
        });
    });
});

// image preview
const previewImage = document.getElementById("image");

previewImage.addEventListener("change", (event) => {
    var Reader = new FileReader();
    Reader.readAsDataURL(previewImage.files[0]);
    Reader.onload = function (ReadEvent) {
        document.getElementById("uploaded").src = ReadEvent.target.result;
    };
});

const forms = document.querySelectorAll('.needs-validation')

// // Loop over them and prevent submission
// Array.from(forms).forEach(form => {
//   form.addEventListener('submit', event => {
//     if (!form.checkValidity()) {
//       event.preventDefault()
//       event.stopPropagation()
//     }

//     form.classList.add('was-validated')
//   }, false)
//     console.log('validazione entrata');
// });

// Loop over them and prevent submission
Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      let check = document.querySelectorAll(".check-type")

      if (check === true) {

      } else {

      }

      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
      console.log('validazione entrata');
  });
