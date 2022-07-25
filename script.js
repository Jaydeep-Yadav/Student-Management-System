// ! index.php

function register() {
  document.getElementById("registerDiv").style.display = "block";
  document.getElementById("loginDiv").style.display = "none";
}

function login() {
  document.getElementById("registerDiv").style.display = "none";
  document.getElementById("loginDiv").style.display = "block";
}
