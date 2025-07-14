// Gắn vào tất cả trang có menu

document.addEventListener('DOMContentLoaded', function () {
  const menuToggle = document.getElementById('menu-toggle');
  const sideMenu = document.getElementById('side-menu');
  const menuClose = document.getElementById('menu-close');

  menuToggle.addEventListener('click', function () {
    sideMenu.style.left = '0'; // Mở menu
  });

  menuClose.addEventListener('click', function () {
    sideMenu.style.left = '-250px'; // Đóng menu
  });
});
