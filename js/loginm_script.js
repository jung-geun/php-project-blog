const signUp = document.querySelector(".sign-up");
const signIn = document.querySelector(".sign-in");

// Switch btns: there are two only because I was in a hurry a didn't want to write all the javascript immediately. In a production environment, a better solution would be implemented.
const btn1 = document.querySelector(".opposite-btn1");
const btn2 = document.querySelector(".opposite-btn2");

// Switches to 'Create Account'
btn1.addEventListener("click", () => {
  signUp.style.display = "block";
  signIn.style.display = "none";
});

// Switches to 'Sign In'
btn2.addEventListener("click", () => {
  signUp.style.display = "none";
  signIn.style.display = "block";
});
