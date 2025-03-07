gsap.registerPlugin(ScrollTrigger, SplitText);

export function caseBlur() {
    const sectionTitles = document.querySelectorAll(".section-container h3");
    const sectionContents = document.querySelectorAll(".section-container .section-text");

    sectionTitles.forEach(title => {
        gsap.fromTo(title, 
            { opacity: 0, y: 20 }, 
            { opacity: 1, y: 0, duration: 3, stagger: 1, ease: "power2.out", 
              scrollTrigger: {
                trigger: title,
                start: "top 80%",
                toggleActions: "play none none none"
              }
            }
        );
    });

    sectionContents.forEach(content => {
        const split = new SplitText(content, { type: "words" });
        const words = split.words;

            gsap.fromTo(words, 
                { opacity: 0, filter: "blur(10px)" }, 
                { opacity: 1, filter: "blur(0px)", duration: 0.9, stagger: 0.1, ease: "power2.out", 
                  scrollTrigger: {
                    trigger: content,
                    start: "top 80%",
                    toggleActions: "play none none none"
                  }
                }
            );
        });
    }