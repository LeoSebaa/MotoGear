

document.getElementById("loginBtn").addEventListener("click", function (e) {
    e.preventDefault();

    const email = document.getElementById("email");
    const password = document.getElementById("password");

    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");


    emailError.textContent = "";
    passwordError.textContent = "";

    let valid = true;

    const emailRegex = /^[A-Za-z0-9]+@(gmail\.com|hotmail\.com)$/;

    if (email.value.trim() === "") {
        emailError.textContent = "Enter your email.";
        valid = false;
    } else if (!emailRegex.test(email.value)) {
        emailError.textContent = "Email must be alphanumeric and end with @gmail.com or @hotmail.com.";
        valid = false;
    }

        const passwordVal = password.value;
        const passwordRegex = /^(?=(?:.*\d){2,})(?=.*[A-Z]).{6,}$/;

if (passwordVal.trim() === "") {
    passwordError.textContent = "Enter your password.";
    valid = false;
} else if (!passwordRegex.test(passwordVal)) {
    passwordError.textContent =
        "Password must be at least 6 characters, contain 1 uppercase letter and 2 numbers.";
    valid = false;
}

   
    if (valid) {
        document.getElementById("loginForm").submit();
    }
});
