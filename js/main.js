console.log ("JS IS RUNNING")

// VARIABLES

const player = new Plyr('video'); 

// FUNCTIONS

let burgerButton = document.querySelector("#burger-button");
let burgerCon = document.querySelector("#burger-con");

function hamburgerMenu() {
    burgerCon.classList.toggle("slide-toggle");
    burgerButton.classList.toggle("expanded");
};


// EVENT LISTENERS
burgerButton.addEventListener("click", hamburgerMenu, false);	