const modal = document.querySelector(".modal-bg");
const trigger = document.querySelector(".information-btn");
const closeButton = document.querySelector(".modal-close");

function toggleModal() {
    modal.classList.toggle("bg-active");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);

////////////////////////////////////////////////////////////////////////////
function openPage(){    
    window.open('#', '_blank');
}