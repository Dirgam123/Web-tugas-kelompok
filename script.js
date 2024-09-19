// Function to handle login
function login(event) {
  event.preventDefault(); // Prevent form from submitting

  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  // Basic login validation (for example purposes)
  if (username === "admin" && password === "admin") {
    window.location.href = "dashboard.html"; // Redirect to dashboard
  } else {
    document.getElementById("error-message").innerText =
      "Invalid username or password";
  }
}

// Function to handle logout (optional)
function logout() {
  alert("You have logged out!");
  window.location.href = "index.html"; // Redirect to login page
}
