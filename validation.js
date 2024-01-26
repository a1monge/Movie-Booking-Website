function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email);
}

function validatePassword(password) {
  const re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{9,}$/;
  return re.test(password);
}

function validateLoginForm() {
  const email = document.getElementById("login-email").value;
  const password = document.getElementById("login-password").value;

  if (!validateEmail(email)) {
    alert("Invalid email address");
    return false;
  }

  if (!validatePassword(password)) {
    alert("Invalid password. Must be at least 9 characters long and contain at least one capital letter and one special character");
    return false;
  }

  return true;
}

function validateSignupForm() {
  const email = document.getElementById("signup-email").value;
  const password = document.getElementById("signup-password").value;

  if (!validateEmail(email)) {
    alert("Invalid email address");
    return false;
  }

  if (!validatePassword(password)) {
    alert("Invalid password. Must be at least 9 characters long and contain at least one capital letter and one special character");
    return false;
  }

  return true;
}

const loginForm = document.getElementById("login-form");
const signupForm = document.getElementById("signup-form");
const signupButton = document.getElementById("signup-button");
const backToLoginButton = document.getElementById("back-to-login-button");

signupButton.addEventListener("click", () => {
  loginForm.classList.add("hidden");
  signupForm.classList.remove("hidden");
});

backToLoginButton.addEventListener("click", () => {
  signupForm.classList.add("hidden");
  loginForm.classList.remove("hidden");
});


window.addEventListener("load", function () {
  const loginForm = document.getElementById("login-form");
  const signupForm = document.getElementById("signup-form");
  const signupButton = document.getElementById("signup-button");
  const backToLoginButton = document.getElementById("back-to-login-button");

  signupButton.addEventListener("click", () => {
    loginForm.classList.add("hidden");
    signupForm.classList.remove("hidden");
  });

  backToLoginButton.addEventListener("click", () => {
    signupForm.classList.add("hidden");
    loginForm.classList.remove("hidden");
  });
});