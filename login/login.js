const openBtn = document.getElementById('open');
//onModal button

const closeBtn = document.getElementById('close');
//offModal button

const modalContent = document.querySelector('.modal-content');

const modal = document.querySelector('.modal');
//HTML에서의 모달 최상위 요소

const overlay = document.querySelector('.modal-overlay');
//모달창이 활성화되면 흐린 배경을 표현하는 요소

const openModal = () => {
  modal.classList.remove('hidden');
};

const closeModal = () => {
  modal.classList.add('hidden');
};

openBtn.addEventListener('click', openModal);
//onModal

modalContent.addEventListener('click', openModal);

closeBtn.addEventListener('click', closeModal);
//모달창 내부의 닫기 버튼

overlay.addEventListener('click', closeModal);
//모달창 영역 밖
