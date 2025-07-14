document.addEventListener('DOMContentLoaded', () => {
  const menu = document.getElementById('side-menu');
  const toggle = document.getElementById('menu-toggle');
  const close = document.getElementById('menu-close');

  toggle.addEventListener('click', () => {
    menu.classList.add('show');
  });

  close.addEventListener('click', () => {
    menu.classList.remove('show');
  });
});
