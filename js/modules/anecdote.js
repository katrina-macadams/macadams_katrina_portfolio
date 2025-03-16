gsap.registerPlugin(SplitText);

export function anecdote() {
    const anecdotes = [
        `I was watching Barbie in the Nutcracker when coding this button`,
        `When I wash dishes I tell them it's bath time`,
        `Former competitive synchronized swimmer—yes, I can hold my breath for a long time`,
        `I say "road trip!" every time I miss an exit while driving`,
        `When I check my phone for the time, I instantly forget the time and have to check again.`,
        `Once got inspired by a color palette and redesigned my entire workspace around it.`,
        `I say "goodnight" to my plants before I go to bed.`,
        `Can spot a pool noodle joust about to go wrong from a mile away`,
        `I’ve absolutely whispered “shhh, it’s okay” to my laptop when it starts overheating.`,
        `Accidentally learned physics by animating 3D simulations`,
        `I say "may I take your coats?" while I'm peeling garlic`,
        `If my sock gets slightly twisted in my shoe, I immediately question if I can survive the rest of the day like this.`,
        `I can sense my phone vibrating and wake up before the alarm even goes off, like some kind of sleep-deprived psychic.`,
        `When I set my purse on an inanimate object, I say "can you hold this please?"`,
        `I say "thank you" to the ATM after it gives me my money`,
        `Somehow both an early riser and someone who needs a nap by 11 AM.`,
        `I have a playlist for every mood, including “fixing keyframes at 2 AM” and “pretending I enjoy meal prep.”`,
        `I say “good enough” and hit send immediately after noticing a typo.`,
        `I have successfully animated realistic water... still working on drinking enough of it though`,
        `I automatically say "ouch" whenever something inanimate drops to the floor because they can't say it themselves`
    ];

    let shuffledAnecdotes = shuffleArray([...anecdotes]);
    let currentIndex = 0;
    let fadeOutTimeout;
    let displayTimeout;

    const button = document.getElementById('anecdote');
    const speechBubble = document.getElementById('speech-bubble');

    button.addEventListener('click', (event) => {
        event.stopPropagation(); 

        gsap.killTweensOf(speechBubble);
        clearTimeout(fadeOutTimeout);
        clearTimeout(displayTimeout);

        if (currentIndex >= shuffledAnecdotes.length) {
            shuffledAnecdotes = shuffleArray([...anecdotes]);
            currentIndex = 0;
        }

        const randomAnecdote = shuffledAnecdotes[currentIndex];
        currentIndex++;

        speechBubble.textContent = randomAnecdote;
        speechBubble.style.display = 'block';
        setTimeout(() => {
            speechBubble.style.opacity = '1';
        }, 10); 

        // Initialize SplitText
        const split = new SplitText(speechBubble, { type: "chars" });
        gsap.set(speechBubble, { opacity: 1 });

        gsap.from(split.chars, {
            duration: 0.05,
            opacity: 0,
            y: 10,
            stagger: 0.02,
            ease: "power2.out"
        });

        fadeOutTimeout = setTimeout(() => {
            speechBubble.style.opacity = '0';
            displayTimeout = setTimeout(() => {
                speechBubble.style.display = 'none';
            }, 500); 
        }, 3500);
    });

    document.addEventListener('mousemove', (event) => {
        speechBubble.style.left = `${event.pageX + 10}px`;
        speechBubble.style.top = `${event.pageY + 10}px`;
    });

    document.addEventListener('click', () => {
        speechBubble.style.opacity = '0';
        setTimeout(() => {
            speechBubble.style.display = 'none';
        }, 500); 
    });

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }
}