export function formValidation() {

const form = document.querySelector("#userForm");
const feedBack = document.querySelector("#feedback");

form.addEventListener("submit", regForm);

function regForm(event) {
  event.preventDefault();
  const thisform = event.currentTarget;
  const url = "sendmail.php";
  const formdata = `lname=${thisform.elements.lname.value}&fname=${thisform.elements.fname.value}&email=${thisform.elements.email.value}&message=${thisform.elements.message.value}`;
  console.log(formdata);

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
      if (response.errors) {
        response.errors.forEach(error => {
          const errorElement = document.createElement("p");
          errorElement.textContent = error;
          feedBack.appendChild(errorElement);
        });
      } else {
        form.reset();
        const messageElement = document.createElement("p");
        messageElement.textContent = response.message;
        feedBack.appendChild(messageElement);
      }
      feedBack.scrollIntoView({ behavior: 'smooth', block: 'end' });
    })
    .catch(error => {
      const errorMessage = document.createElement("p");
      errorMessage.textContent = "There was an error with the server, please try again later";
      feedBack.appendChild(errorMessage);
    });
}
}