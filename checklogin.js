const email = sessionStorage.getItem("email");
const UID = sessionStorage.getItem("UID");
if (!email) {
  window.location.href = "login.html";
}
document.getElementById('emailprofile').innerText=email;