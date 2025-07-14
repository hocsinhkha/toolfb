document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.getElementById('menu-toggle');
  const menu = document.getElementById('side-menu');
  const close = document.getElementById('menu-close');

  toggle.addEventListener('click', () => {
    menu.classList.add('show');
  });

  close.addEventListener('click', () => {
    menu.classList.remove('show');
  });
});
