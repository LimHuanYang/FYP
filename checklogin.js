const email = sessionStorage.getItem("email");
if (!email) {
  window.location.href = "login.html";
}
document.getElementById('emailprofile').innerText=email;