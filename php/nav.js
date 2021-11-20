const navBar = document.querySelector('.nav-bar');
const outside = document.querySelector('.outside');

const openMenu = () => {
  navBar.classList.remove('hidden');
  outside.classList.remove('hidden');
};

const closeMenu = () => {
  navBar.classList.add('hidden');
  outside.classList.add('hidden');
};
