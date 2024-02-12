import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);
import "./mychart.js";

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

if (previewImage) {
    previewImage.addEventListener("change", (event) => {
        var Reader = new FileReader();
        Reader.readAsDataURL(previewImage.files[0]);
        Reader.onload = function (ReadEvent) {
            document.getElementById("uploaded").src = ReadEvent.target.result;
        };
    });
}

const forms = document.querySelectorAll(".needs-validation");

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
Array.from(forms).forEach((form) => {
    form.addEventListener(
        "submit",
        (event) => {
            let checkBox = document.querySelectorAll(".check-type");

            for (let i = 0; i < checkBox.length; i++) {
                checkBox[i].setAttribute("required", "");
            }

            for (let i = 0; i < checkBox.length; i++) {
                if (checkBox[i].checked) {
                    for (let i = 0; i < checkBox.length; i++) {
                        checkBox[i].removeAttribute("required", "");
                    }
                }
            }

            const oFile = document.getElementById("image").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>
            let fileSize = true;

            if (oFile){
                console.log(oFile);
                if (oFile.size > 1097152) {
                    fileSize = false;
                    oFile = '';
                    // 2 MiB for bytes.
                    alert("File size must under 1MiB!");
                }
            }

            if (!form.checkValidity() || !fileSize) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add("was-validated");
        },
        false
    );
});
