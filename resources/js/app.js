require('./bootstrap');

var ingsToDelete = [];
var ingPlato = document.getElementsByName("ingsToDelete")[0];
var selectIng = document.getElementsByName("ingrediente")[0];
var delIngs = document.getElementsByClassName("delIng");
var smallEdit = document.getElementById('smallEdit');
var smallDelete = document.getElementById('smallDelete');
var valorPlato = document.getElementById('smallDelete');
var updateBtn = document.getElementById('updateBtn');
var deleteBtn = document.getElementById('deleteBtn');

$("#nombrePlato").on("input", function() {
    smallEdit.classList.remove('d-none');
    updateBtn.removeAttribute('disabled');
    deleteBtn.removeAttribute('disabled');
});

$("#valorPlato").on("input", function() {
    smallEdit.classList.remove('d-none');
    updateBtn.removeAttribute('disabled');
    deleteBtn.removeAttribute('disabled');
});

function deleteIng() {
  smallDelete.classList.remove('d-none');
  updateBtn.removeAttribute('disabled');
  deleteBtn.removeAttribute('disabled');
  ingsToDelete.push(this.previousElementSibling.id);
  this.previousElementSibling.classList.remove('btn-secondary');
  this.previousElementSibling.classList.add('btn-danger');
  this.previousElementSibling.innerHTML = '<del>'+this.previousElementSibling.innerHTML+'</del>';
  this.classList.add('d-none');
  ingPlato.value = ingsToDelete;
}

for(let i of delIngs){
  i.addEventListener('click', deleteIng);
}