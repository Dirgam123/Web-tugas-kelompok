document.getElementById("post-form").addEventListener("submit", function (e) {
  e.preventDefault();

  const postContent = document.getElementById("post-content").value;

  const newPost = document.createElement("div");
  newPost.classList.add("post");

  const newPostTitle = document.createElement("h3");
  newPostTitle.textContent = "New Discussion";

  const newPostBody = document.createElement("p");
  newPostBody.textContent = postContent;

  newPost.appendChild(newPostTitle);
  newPost.appendChild(newPostBody);

  document.querySelector(".discussion").appendChild(newPost);

  document.getElementById("post-content").value = "";
});
