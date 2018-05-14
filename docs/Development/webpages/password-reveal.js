function passwordReveal(button) {
    var x = document.getElementById("password-field");
    if (x.type === "password") {
        x.type = "text";
        button.innerHTML = "Hide";
    } else {
        x.type = "password";
        button.innerHTML = "Show";

      }
   }



// reference https://codepen.io/Sohail05/pen/yOpeBm
