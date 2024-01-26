function login() {
    const loginForm = document.getElementById("login-form");
    const loginButton = document.getElementById("login-button");

    loginForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const email = document.getElementById("login-email").value;
        const password = document.getElementById("login-password").value;
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/Project/SEProjectPhase2/check_credentials.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            console.log(xhr.responseText); // add this line to see the response
            if (xhr.status === 200) {
                if (xhr.responseText === "admin") {
                    window.location.href = "Admin.html";
                } else if (xhr.responseText === "valid") {
                    window.location.href = "catalogue.html";
                }
            } else {
                alert("Error: " + xhr.statusText);
            }
        };

        xhr.send("email=" + email + "&password=" + password);
        console.log("Sending request..."); // add this line to confirm that the request is being sent
    });
}