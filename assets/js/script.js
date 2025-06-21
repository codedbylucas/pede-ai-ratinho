// MODAL CARDÁPIO
const abrir = document.getElementById("abrirModal");
const modal = document.getElementById("modalCardapio");
const fechar = document.getElementById("fecharModal");

abrir.onclick = () => {
  modal.style.display = "flex";
  setTimeout(() => modal.style.opacity = "1", 10);
};

fechar.onclick = () => {
  modal.style.opacity = "0";
  setTimeout(() => modal.style.display = "none", 300);
};

window.onclick = e => {
  if (e.target == modal) {
    modal.style.opacity = "0";
    setTimeout(() => modal.style.display = "none", 300);
  }
};


