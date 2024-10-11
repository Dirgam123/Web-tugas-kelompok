// Login form submission handling
document.getElementById("login-form").addEventListener("submit", function (e) {
  e.preventDefault();

  const email = document.getElementById("login-email").value;
  const password = document.getElementById("login-password").value;

  // Simulate a login process (you'll need to replace this with actual authentication logic)
  if (email === "test@example.com" && password === "password123") {
    alert("Login successful!");
    // Redirect or proceed with login logic
    window.location.href = "profile.html"; // Example redirect after login
  } else {
    alert("Invalid email or password. Please try again.");
  }
});

// Register form submission handling
document
  .getElementById("register-form")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    const name = document.getElementById("register-name").value;
    const email = document.getElementById("register-email").value;
    const password = document.getElementById("register-password").value;

    // Simulate a registration process (you'll need to replace this with actual registration logic)
    if (name && email && password) {
      alert("Registration successful!");
      // Redirect to login page or proceed with other logic
      window.location.href = "login.html"; // Example redirect after registration
    } else {
      alert("Please fill in all fields.");
    }
  });
