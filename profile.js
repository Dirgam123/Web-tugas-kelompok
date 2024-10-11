document.getElementById("edit-btn").addEventListener("click", function () {
  // Toggle the edit profile section visibility
  document.querySelector(".profile-edit").classList.toggle("hidden");
});

document
  .getElementById("edit-profile-form")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    // Get the updated values from the form
    const newUsername = document.getElementById("edit-username").value;
    const newBio = document.getElementById("edit-bio").value;

    // Update the profile info on the page
    document.getElementById("username").textContent = newUsername;
    document.getElementById("bio").textContent = newBio;

    // Hide the edit form after saving
    document.querySelector(".profile-edit").classList.add("hidden");
  });
