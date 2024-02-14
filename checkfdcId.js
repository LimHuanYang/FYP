function getQueryParameter(name) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(name);
}


const fdcId = getQueryParameter("fdcId");
if (fdcId !== null && fdcId!=="") {
  console.log("fdcId is not null:", fdcId);
} else {
  window.location.href = "searchfood.html";
}
