document.addEventListener("DOMContentLoaded", () => {
  const toggle = document.getElementById("menu-toggle");
  const menu = document.getElementById("side-menu");
  const close = document.getElementById("close-menu");

  toggle.addEventListener("click", () => {
    menu.classList.toggle("hidden");
  });

  close.addEventListener("click", () => {
    menu.classList.add("hidden");
  });
});
