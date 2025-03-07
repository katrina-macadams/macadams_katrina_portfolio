export function scrollTo() {
gsap.registerPlugin(ScrollToPlugin);

const navLinks = document.querySelectorAll("#main-header nav #burger-con ul li a");

function scrollLink(e) {
  // Check if the link contains a hash (e.g., #about, #contact)
  if (!e.currentTarget.hash) {
    return; // Skip handling links without hashes
  }

  console.log(e.currentTarget.hash);
  e.preventDefault();
  let selectedLink = e.currentTarget.hash;
  gsap.to(window, { duration: 1, scrollTo: { y: `${selectedLink}`, offsetY: 100 } });
}

navLinks.forEach((link) => {
  link.addEventListener("click", scrollLink);
});
}