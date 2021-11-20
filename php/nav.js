const navBar = document.querySelector('.nav-bar');
const outside = document.querySelector('.outside');

const openMenu = () => {
  console.log('open');
  navBar.classList.remove('hidden');
};

const closeMenu = () => {
  console.log('hidden');
  navBar.classList.add('hidden');
};
