import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

const previewImage = document.getElementById("image");

previewImage.addEventListener("change", (event)=>{
    var Reader = new FileReader();
    Reader.readAsDataURL(previewImage.files[0]);
    Reader.onload = function(ReadEvent) {
        document.getElementById("uploaded").src= ReadEvent.target.result;
    };
});
