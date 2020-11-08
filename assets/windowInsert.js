const btnShow = document.querySelector(".btn-show");
const btnHidden = document.querySelector(".btn-hidden");
const hiddenMain = document.querySelector(".hidden");
const closeShow = document.querySelector(".close-show")
 
btnShow.addEventListener("click", () => {
    hiddenMain.classList.add("inserting");
});

btnHidden.addEventListener("click", () => {
    hiddenMain.classList.remove("inserting");
});

closeShow.addEventListener("click", () => {
    hiddenMain.classList.remove("inserting");
});