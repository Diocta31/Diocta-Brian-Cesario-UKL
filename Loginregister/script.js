document.addEventListener("DOMContentLoaded", function () {
  const wrapper = document.querySelector(".wrapper");
  const registerLink = document.querySelector(".register-link");
  const loginLink = document.querySelector(".login-link");

  registerLink.addEventListener("click", function (event) {
    event.preventDefault(); // untuk mencegah perilaku default dari tautan

    if (!wrapper.classList.contains("active")) {
      wrapper.classList.add("active");
    }
  });

  loginLink.addEventListener("click", function (event) {
    event.preventDefault(); // untuk mencegah perilaku default dari tautan

    if (wrapper.classList.contains("active")) {
      wrapper.classList.remove("active");
    }
  });
});
