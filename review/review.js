const editButton = document.getElementById('edit');

editButton.addEventListener('click', function (event) {
  alert('hello');
  const id = event.target.value;
  window.open('/review/edit.php', 'edit-popup', 'width:1000, height:1000');
});
