export function backToTop() {

const backToTopBtn = document.getElementById("backToTopBtn");

window.onscroll = function () {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    backToTopBtn.classList.add("show");
  } else {
    backToTopBtn.classList.remove("show");
  }
};

backToTopBtn.addEventListener("click", function () {
  gsap.to(window, { scrollTo: 0, duration: 1, ease: "power2.out" });
});

}