

document.getElementById("loginBtn").addEventListener("click", function (e) {
    e.preventDefault();

    const username = document.getElementById("username");
    const password = document.getElementById("password");

    const usernameError = document.getElementById("usernameError");
    const passwordError = document.getElementById("passwordError");


    usernameError.textContent = "";
    passwordError.textContent = "";

    let valid = true;

    if (username.value.trim() === "") {
        usernameError.textContent = "Please enter your username.";
        valid = false;
    } else if (username.value.length < 3) {
        usernameError.textContent = "Username must have at least 3 characters.";
        valid = false;
    }

    if (password.value.trim() === "") {
        passwordError.textContent = "Please enter your password.";
        valid = false;
    } else if (password.value.length < 6) {
        passwordError.textContent = "Password must be at least 6 characters long.";
        valid = false;
    }

   
    if (valid) {
        document.getElementById("loginForm").submit();
    }
});
