gsap.registerPlugin(ScrollTrigger, SplitText);

export function aboutOverlay() {
  const aboutSection = document.querySelector("#about");
  const overlay = document.querySelector("#overlay");
  const closeOverlayButton = document.querySelector("#close-overlay");
  const aboutTitle = document.querySelector("#about h2");
  const aboutContent = document.querySelector("#about-content");

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

  gsap.fromTo(aboutTitle, 
      { opacity: 0, y: 20 }, 
      { opacity: 1, y: 0, duration: 3, stagger: 1, ease: "power2.out", 
        scrollTrigger: {
          trigger: aboutTitle,
          start: "top 80%",
          toggleActions: "play none none none"
        }
      }
  );

  const split = new SplitText(aboutContent, { type: "words" });
  gsap.fromTo(split.words, 
      { opacity: 0, filter: "blur(10px)" }, 
      { opacity: 1, filter: "blur(0px)", duration: 1, stagger: 0.1, ease: "power2.out", 
        scrollTrigger: {
          trigger: aboutContent,
          start: "top 80%",
          toggleActions: "play none none none"
        }
      }
  );
}

