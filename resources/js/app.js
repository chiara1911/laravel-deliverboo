import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);


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
        })

    })
})
