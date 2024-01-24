function validateUsername() {
  var username = document.getElementById("usernameInput").value;
  const letters = /^[A-Za-z]+$/;
  if (username.match(letters)) {
    usernamealert.innerText = "";
    usernamealert.style.display = "none";
    return false;
  } else {
    usernamealert.innerText = "Only allows alphabets and spaces";
    usernamealert.style.display = "block";
    return true;
  }
}

function validateEmail() {
  var email = document.getElementById("emailInput").value;
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(email)) {
    emailalert.innerText = "Invalid email format";
    emailalert.style.display = "block";
    return false;
  } else {
    emailalert.innerText = "";
    emailalert.style.display = "none";
    return true;
  }
}
function validatePassword() {
  var password = document.getElementById("passwordInput").value;
  var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
  if (password.length < 8) {
    passwordalert.innerText = "Password must be at least 8 characters";
    passwordalert.style.display = "block";
    return false;
  } else if (!regex.test(password)) {
    passwordalert.innerText =
      "Password must contain at least 1 lowercase letter, one uppercase letter, and one digit";
    passwordalert.style.display = "block";
    return false;
  } else {
    passwordalert.innerText = "";
    passwordalert.style.display = "none";
    return true;
  }
}

function validateRepeatPassword() {
  var password = document.getElementById("passwordInput").value;
  var repeatPassword = document.getElementById("repeatpasswordInput").value;
  const passwordalert = document.getElementById("passwordalert");

  if (password === repeatPassword) {
    passwordalert.innerText = "";
    passwordalert.style.display = "none";
    return false;
  } else {
    passwordalert.innerText = "Password is not the same";
    passwordalert.style.display = "block";
    return true;
  }
}

function validateGender() {
  gender = document.getElementById("genderInput").value;
  if (gender !== "Gender") {
    genderalert.innerText = "Please select a gender";
    genderalert.style.display = "block";
    return true;
  } else {
    genderalert.innerText = "";
    genderalert.style.display = "none";
    return false;
  }
}

function validateHeight(height) {
  if (!isNaN(height) && height > 0) {
    return true;
  } else {
    return false;
  }
  
}

function validateWeight(Weight) {
  if (!isNaN(Weight) && Weight > 0) {
    return true;
  } else {
    return false;
  }
}
