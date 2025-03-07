gsap.registerPlugin(SplitText)


export function heroAnimation() {
    const creativeText = document.querySelector("#creative-text");
    const texts = ["Creative Motion", "Creative Storytelling", "Creative Vision", "Creative Interaction", "Creative Coding", "Creative Thinking", "Creative Design", "Creative Innovation"];
    let index = 0;

gsap.fromTo("#hero h1, #hero h2", 
    { opacity: 0, y: 20 }, 
    { opacity: 1, y: 0, duration: 3, stagger: 1, ease: "power2.out" }
);

function animateText() {
    const split = new SplitText(creativeText, { type: "words,chars" });
    gsap.fromTo(split.chars, 
        { opacity: 0, filter: "blur(10px)" }, 
        { opacity: 1, filter: "blur(0px)", duration: 1, stagger: 0.05, ease: "power2.out", onComplete: () => {
            setTimeout(() => {
                gsap.to(split.chars, {
                    duration: 1,
                    opacity: 0,
                    filter: "blur(10px)",
                    stagger: 0.05,
                    ease: "power2.in",
                    onComplete: () => {
                        index = (index + 1) % texts.length;
                        creativeText.textContent = texts[index];
                        animateText();
                    }
                });
            }, 2000); // Time before switching to the next text
        }}
    );
}

animateText();
}