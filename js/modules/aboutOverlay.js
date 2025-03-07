export function aboutOverlay() {

const aboutSection = document.querySelector("#about");
const overlay = document.querySelector("#overlay");
const closeOverlayButton = document.querySelector("#close-overlay");

aboutSection.addEventListener("click", () => {
  overlay.classList.add("visible");
});

closeOverlayButton.addEventListener("click", () => {
  overlay.classList.remove("visible");
});

overlay.addEventListener("click", (e) => {
  if (e.target === overlay) {
    overlay.classList.remove("visible");
  }
});

}