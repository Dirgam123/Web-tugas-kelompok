function login(event) {
  event.preventDefault();

  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  if (username === "admin" && password === "admin") {
    window.location.href = "dashboard.html";
  } else {
    document.getElementById("error-message").innerText =
      "Invalid username or password";
  }
}

function logout() {
  alert("You have logged out!");
  window.location.href = "index.html";
}
