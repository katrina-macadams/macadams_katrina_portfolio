export function lily() {
    const canvas = document.querySelector("#lily");
    const context = canvas.getContext("2d");

    canvas.width = 2560; 
    canvas.height = 1500; 

    const frameCount = 360;

    const images = [];
    const flower = { frame: 0 };

    for (let i = 0; i < frameCount; i++) {
        const img = new Image();
        img.src = `images/lily/lily-hero_${(i + 1).toString().padStart(5, '0')}.png`;
        img.onload = () => console.log(`Image ${i + 1} loaded`);
        img.onerror = () => console.error(`Failed to load image ${i + 1}`);
        images.push(img);
    }

    gsap.to(flower, {
        frame: frameCount - 1,
        snap: "frame",
        repeat: -1, 
        duration: 11.5, 
        ease: "none",
        onUpdate: render
    });

    images[0].addEventListener("load", render);

    function render() {
        console.log(`Rendering frame ${flower.frame}`);
        context.clearRect(0, 0, canvas.width, canvas.height);
        const img = images[flower.frame];
        context.drawImage(img, 0, 0, canvas.width, canvas.height);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    lily();
});