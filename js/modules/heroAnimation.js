

export function heroAnimation() {
gsap.fromTo("#hero h1, #hero h2", 
    { opacity: 0, y: 20 }, 
    { opacity: 1, y: 0, duration: 3, stagger: 1, ease: "power2.out" }
);
}