console.log ("JS IS RUNNING");

(() => {
gsap.registerPlugin(MorphSVGPlugin);
const checkbox = document.querySelector("#toggleCheckbox");

 
  const darc = document.querySelector("#darc");
  const line5 = document.querySelector("#line5");
  const line6 = document.querySelector("#line6");
  const line7 = document.querySelector("#line7");

  const arcTarget = document.querySelector("#arc");
  const line1Target = document.querySelector("#line1");
  const line2Target = document.querySelector("#line2");
  const line3Target = document.querySelector("#line3");


  checkbox.addEventListener("change", (e) => {
    if (checkbox.checked) {
      // Morph to portal
      gsap.to(darc, { duration: 1, morphSVG: arcTarget });
      gsap.to(line5, { duration: 1, morphSVG: line1Target });
      gsap.to(line6, { duration: 1, morphSVG: line2Target });
      gsap.to(line7, { duration: 1, morphSVG: line3Target });
    } else {
      // Morph back to default
      gsap.to(darc, { duration: 1, morphSVG: "#darc" });
      gsap.to(line5, { duration: 1, morphSVG: "#line5" });
      gsap.to(line6, { duration: 1, morphSVG: "#line6" });
      gsap.to(line7, { duration: 1, morphSVG: "#line7" });
    }
  });

  document.getElementById('toggleCheckbox').addEventListener('change', function () {
    const mainNav = document.getElementById('main-nav');
    if (this.checked) {
        mainNav.classList.add('nav-open');
    } else {
        mainNav.classList.remove('nav-open');
    }
});

})();



(() => {
const toggleModal = document.querySelector(".toggle");
const bottomSheet = document.querySelector(".bottom-sheet");
const sheetOverlay = document.querySelector(".sheet-overlay");


const showBottomSheet = () => {
  bottomSheet.classList.add("show");
  console.log("show overlay clicked")
}

const hideBottomSheet = () => {
  bottomSheet.classList.remove("show");
}

toggleModal.addEventListener("click", showBottomSheet);
sheetOverlay.addEventListener("click",hideBottomSheet);

})();

(() => {
const blink = document.getElementById("blink");


function toggleFade() {
    blink.classList.toggle("fade");
}

setInterval(toggleFade, 900);
})();



const player = new Plyr('video'); 

(() => {
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
  
  })();