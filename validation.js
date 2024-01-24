function validateUsername() {
  var username = document.getElementById("usernameInput").value;
  usernamealert = document.getElementById("usernamealert");
  const letters = /^[A-Za-z\s]+$/;
  if (!username) {
    usernamealert.innerText = "Please fill in your username";
    usernamealert.style.display = "block";
    return false;
  } else if (username.match(letters)) {
    usernamealert.innerText = "";
    usernamealert.style.display = "none";
    return true;
  } else {
    usernamealert.innerText = "Only allows alphabets and spaces";
    usernamealert.style.display = "block";
    return false;
  }
}

function validateEmail() {
  var email = document.getElementById("emailInput").value;
  emailalert = document.getElementById("emailalert");
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!email) {
    emailalert.innerText = "Please fill in your email";
    emailalert.style.display = "block";
    return false;
  } else if (!emailRegex.test(email)) {
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
  passwordalert = document.getElementById("passwordalert");
  var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
  if (!password) {
    passwordalert.innerText = "Please fill in your password";
    passwordalert.style.display = "block";
    return false;
  } else if (password.length < 8) {
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
  passwordalert = document.getElementById("passwordalert");

  if (password === repeatPassword) {
    passwordalert.innerText = "";
    passwordalert.style.display = "none";
    return true;
  } else {
    passwordalert.innerText = "Password is not the same";
    passwordalert.style.display = "block";
    return false;
  }
}
function validateDob() {
  date = document.getElementById("dobInput").value;
  genderalert = document.getElementById("genderalert");
  if (date === "" || date === null) {
    genderalert.innerText = "Please enter date of birth";
    genderalert.style.display = "block";
    return false;
  } else {
    genderalert.innerText = date;
    genderalert.style.display = "block";
    return true;
  }
}
function validateGender() {
  gender = document.getElementById("genderInput").value;
  genderalert = document.getElementById("genderalert");
  if (gender !== "") {
    genderalert.innerText = "";
    genderalert.style.display = "none";
    return true;
  } else {
    genderalert.innerText = "Please select a gender";
    genderalert.style.display = "block";
    return false;
  }
}

function validateHeight() {
  height = document.getElementById("heightInput").value;
  hwalert = document.getElementById("hwalert");
  if (!height) {
    hwalert.innerText = "Please fill in your height or weight";
    hwalert.style.display = "block";
    return false;
  } else if (!isNaN(height) && height > 50) {
    hwalert.innerText = "";
    hwalert.style.display = "none";
    return true;
  } else {
    hwalert.innerText = "Please enter the correct height and weight";
    hwalert.style.display = "block";
    return false;
  }
}

function validateWeight() {
  weight = document.getElementById("weightInput").value;
  hwalert = document.getElementById("hwalert");
  if (!weight) {
    hwalert.innerText = "Please fill in your height or weight";
    hwalert.style.display = "block";
    return false;
  } else if (!isNaN(weight) && weight > 20) {
    hwalert.innerText = "";
    hwalert.style.display = "none";
    return true;
  } else {
    hwalert.innerText = "Please enter the correct height and weight";
    hwalert.style.display = "block";
  }
}
