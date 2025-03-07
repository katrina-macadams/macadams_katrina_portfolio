export function blink() {

const blink = document.getElementById("blink");

function toggleFade() {
  blink.classList.toggle("fade");
}

setInterval(toggleFade, 900);

}