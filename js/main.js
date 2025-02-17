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

  (() => {

    gsap.registerPlugin(ScrollToPlugin)

    const navLinks = document.querySelectorAll("#main-header nav #burger-con ul li a");
  
    console.log(navLinks)
    function scrollLink(e) {
      // Check if the link contains a hash (e.g., #about, #contact)
      if (!e.currentTarget.hash) {
          return; // Skip handling links without hashes
      }

      console.log(e.currentTarget.hash);
      e.preventDefault();
      let selectedLink = e.currentTarget.hash;
      gsap.to(window, {duration: 1, scrollTo: {y: `${selectedLink}`, offsetY: 100}});
  }

    navLinks.forEach((link) => {
        link.addEventListener("click", scrollLink);
    })
})();

const player = new Plyr('video'); 


  gsap.to("h1", {
    opacity: 1,         
    y: -30,             
    duration: 2,          
    ease: "power3.out",   
    delay: 0.5        
});

gsap.to("h3", {
    opacity: 1,           
    y: -20,               
    duration: 1,          
    ease: "power3.out",  
    delay: 1             
});

(() => {

const backToTopBtn = document.getElementById("backToTopBtn");


window.onscroll = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        backToTopBtn.classList.add("show"); 
    } else {
        backToTopBtn.classList.remove("show"); 
    }
};


backToTopBtn.addEventListener("click", function() {
    gsap.to(window, { scrollTo: 0, duration: 1, ease: "power2.out" });
});

})();


// ABOUT OVERLAY

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

//   FORM VALIDATION
  (()=>{
	const form = document.querySelector("#userForm");
    const feedBack = document.querySelector("#feedback");

    form.addEventListener("submit", regForm);

    function regForm(event){
        event.preventDefault();
        // console.log("regForm Called");
        const thisform = event.currentTarget;
        const url = "sendmail.php";
        const formdata = `lname=${thisform.elements.lname.value}&fname=${thisform.elements.fname.value}&email=${thisform.elements.email.value}&message=${thisform.elements.message.value}`;
        console.log(formdata); 
        // this is the data that we are going to send to the server
        // const called formdata, capture everything in the form and then make an ajax call and then empty the form. value is going to be what the user has typed onto the lname field 

        fetch(url, {
            method: "POST", 
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: formdata 
        })
        .then(response => response.json())
        .then(response => {
            console.log(response); 
            feedBack.innerHTML = "";
            if(response.errors) {
                response.errors.forEach(error => {
                    const errorElement = document.createElement("p");
                    errorElement.textContent = error;
                    feedBack.appendChild(errorElement); 
                })
            }
            else {
                form.reset();
                const messageElement = document.createElement("p");
            }
            feedBack.scrollIntoView({behavior: 'smooth', block: 'end'})
        })
        .catch(error => {
            const errorMessage = document.createElement("p");
            errorMessage.textContent = "There was an error with the server, please try again later";
            feedBack.appendChild(errorMessage);
        });



    }

    form.addEventListener("submit", regForm);


})();

  
  

