export function bottomSheet() {

const toggleModal = document.querySelector(".toggle");
const bottomSheet = document.querySelector(".bottom-sheet");
const sheetOverlay = document.querySelector(".sheet-overlay");

const showBottomSheet = () => {
  bottomSheet.classList.add("show");
  console.log("show overlay clicked");
};

const hideBottomSheet = () => {
  bottomSheet.classList.remove("show");
};

toggleModal.addEventListener("click", showBottomSheet);
sheetOverlay.addEventListener("click", hideBottomSheet);
}