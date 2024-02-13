import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);
import "./mychart.js";

// modale delete
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
        const btnRemove = modal.querySelector("button.btn-edit");
        btnRemove.addEventListener("click", (event) => {
            button.parentElement.submit();
        });
    });
});

// modale restore
const btnRestore = document.querySelectorAll(".restore-btn");
btnRestore.forEach((button) => {
    button.addEventListener("click", (event) => {
        //non invio form
        event.preventDefault();

        //prendo titolo progetto dal cancel button
        const dataTitle = button.getAttribute("data-item-title");

        //prendo modal
        const modal = document.getElementById("restoreModal");

        //creo e mostro modal
        const myModal = new bootstrap.Modal(modal);
        myModal.show();

        //inserisco titolo progetto nel modal
        const title = modal.querySelector("#modal-item-title");
        title.innerHTML = dataTitle;

        //invio form
        const btnRemove = modal.querySelector("button.btn-edit");
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

            const imgFile = document.getElementById("image"); // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>
            let fileSize = true;

            if (imgFile){
                if (imgFile.files[0]){
                    console.log(imgFile.files[0]);

                    const limit = 1000;
                    const size = imgFile.files[0].size/1024;
                    if (size > limit) {
                        fileSize = false;
                        imgFile.value = '';
                        // 2 MiB for bytes.
                        // alert("File size must under 1MiB!");
                        document.querySelector('.invalid-feedback-max-size').classList.remove('d-none');
                    } else {
                        document.querySelector('.invalid-feedback-max-size').classList.add('d-none');
                    }
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
