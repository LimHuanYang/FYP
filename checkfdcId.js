function getQueryParameter(name) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(name);
}


const fdcId = getQueryParameter("fdcId");
if (fdcId == null || fdcId=="") {
  window.location.href = "searchfood.html";
}
