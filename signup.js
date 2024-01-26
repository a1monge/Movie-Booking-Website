
function signup() {
  const name = document.getElementById("signup-name").value;
  const email = document.getElementById("signup-email").value;
  const password = document.getElementById("signup-password").value;
  $.ajax({
    type: "POST",
    url: "http://localhost/Project/SEProjectPhase2/signup.php",
    data: { name: name, email: email, password: password },
    success: function (response) {
      alert(response);
    }
  });
}
