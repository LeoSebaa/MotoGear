document.getElementById("registerBtn").addEventListener("click", function (e) {
    e.preventDefault();  

    const name = document.getElementById("name");
    const surname = document.getElementById("surname");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const birthday = document.getElementById("birthday");
    const phone = document.getElementById("phone");
    const terms = document.getElementById("terms");

    const nameError = document.getElementById("nameError");
    const surnameError = document.getElementById("surnameError");
    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");
    const birthdayError = document.getElementById("birthdayError");
    const phoneError = document.getElementById("phoneError");
    const termsError = document.getElementById("termsError");

    const errors = document.querySelectorAll(".error");
    errors.forEach(e => e.textContent = "");

    let valid = true;

    if (name.value.trim() === "") {
        nameError.textContent = "Enter your name.";
        valid = false;
    } else if (name.value.length > 15) {
        nameError.textContent = "Name cannot have more than 15 characters.";
        valid = false;
    }

    if (surname.value.trim() === "") {
        surnameError.textContent = "Enter your surname.";
        valid = false;
    } else if (surname.value.length > 15) {
        surnameError.textContent = "Surname cannot have more than 15 characters.";
        valid = false;
    }

    const emailRegex = /^[A-Za-z0-9]+@(gmail\.com|hotmail\.com)$/;

    if (email.value.trim() === "") {
        emailError.textContent = "Enter your email.";
        valid = false;
    } else if (!emailRegex.test(email.value)) {
        emailError.textContent = "Email must be alphanumeric and end with @gmail.com or @hotmail.com.";
        valid = false;
    }

    const passwordVal = password.value;
    const numCount = (passwordVal.match(/\d/g) || []).length;
    const hasUpper = /[A-Z]/.test(passwordVal);

    if (passwordVal.trim() === "") {
        passwordError.textContent = "Enter your password.";
        valid = false;
    } else if (passwordVal.length < 6) {
        passwordError.textContent = "Password must have at least 6 characters.";
        valid = false;
    } else if (!hasUpper) {
        passwordError.textContent = "Password must have at least one uppercase letter.";
        valid = false;
    } else if (numCount < 2) {
        passwordError.textContent = "Password needs to have at least 2 numbers.";
        valid = false;
    }

    if (birthday.value === "") {
        birthdayError.textContent = "Select your birth date.";
        valid = false;
    } else {
        const birthDate = new Date(birthday.value);
        const today = new Date();
        const age = today.getFullYear() - birthDate.getFullYear();
        const m = today.getMonth() - birthDate.getMonth();
        const d = today.getDate() - birthDate.getDate();
        if (age < 18 || (age === 18 && (m < 0 || (m === 0 && d < 0)))) {
            birthdayError.textContent = "U need to be atleast 18 years old to register.";
            valid = false;
        }
    }


    if (phone.value.trim() === "") {
        phoneError.textContent = "Enter your phone number.";
        valid = false;
    } else if (!/^[0-9]{8,15}$/.test(phone.value)) {
        phoneError.textContent = "Number can contain 8-15 numbers.";
        valid = false;
    }

    if (!terms.checked) {
        termsError.textContent = "Please accept terms and conditions";
        valid = false;
    }

    if (valid) {
        window.location.href = "logInPage.html";
    }
});