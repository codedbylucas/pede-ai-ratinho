
// MODAL FORMULÁRIO
const modalFormulario = document.getElementById("modalFormulario");
const abrirModalFormulario = document.getElementById("abrirModalFormulario");
const fecharModalFormulario = document.getElementById("fecharModalFormulario");

abrirModalFormulario.onclick = () => {
    modalFormulario.style.display = "flex";
    setTimeout(() => modalFormulario.style.opacity = "1", 10);
};

fecharModalFormulario.onclick = () => {
    modalFormulario.style.opacity = "0";
    setTimeout(() => modalFormulario.style.display = "none", 300);
};

window.onclick = e => {
    if (e.target === modalFormulario) {
        modalFormulario.style.opacity = "0";
        setTimeout(() => modalFormulario.style.display = "none", 300);
    }
};

// Abre o modal de edição e carrega os dados via AJAX
document.querySelectorAll('.btn-editar').forEach(botao => {
    botao.addEventListener('click', () => {
        const id = botao.dataset.id;
        const modal = document.getElementById('modalEditar');
        const conteudo = document.getElementById('conteudoEditarModal');

        fetch(`editar.php?id=${id}`)
            .then(res => res.text())
            .then(html => {
                conteudo.innerHTML = html;
                modal.style.display = 'flex';
                setTimeout(() => modal.style.opacity = 1, 10);
            })
            .catch(err => {
                conteudo.innerHTML = `<p style="color:red;">Erro ao carregar: ${err}</p>`;
                modal.style.display = 'flex';
            });
    });
})


// SUBMIT DO FORMULÁRIO DE CADASTRO E EDIÇÃO
document.addEventListener("submit", function (e) {
    const form = e.target;
    const formData = new FormData(form);
    const action = form.action;

    if (
        action.endsWith("CadastrarPedidoController.php") ||
        action.endsWith("EditarPedidoController.php")
    ) {
        e.preventDefault();

        fetch(action, {
            method: "POST",
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                if (data.sucesso) {
                    const pedido = data.pedido;

                    if (action.endsWith("CadastrarPedidoController.php")) {
                        // Grava a mensagem na sessionStorage e redireciona
                        sessionStorage.setItem("mensagem", "Pedido cadastrado com sucesso!");
                        sessionStorage.setItem("tipoMensagem", "sucesso");
                        window.location.href = "../views/inicio.php";
                    } else if (action.endsWith("EditarPedidoController.php")) {
                        mostrarAlerta("Pedido atualizado com sucesso!", "sucesso");

                        const linha = document.querySelector(`#pedido-${pedido.id}`);
                        if (linha) {
                            linha.children[0].textContent = pedido.nome;
                            linha.children[1].textContent = pedido.observacao;
                            linha.children[2].textContent = `R$ ${parseFloat(pedido.valor).toFixed(2).replace('.', ',')}`;
                            linha.children[3].textContent = pedido.pagamento;
                            linha.classList.add('atualizado');
                            setTimeout(() => linha.classList.remove('atualizado'), 1500);
                        }

                        document.getElementById("modalEditar").style.display = "none";
                    }
                } else {
                    mostrarAlerta(data.erro || "Erro desconhecido", "erro");
                }
            })
            .catch(err => {
                mostrarAlerta("Erro na requisição: " + err, "erro");
            });
    }
});

// ALERTA VISUAL
function mostrarAlerta(mensagem, tipo = 'sucesso') {
    const alerta = document.getElementById("alerta");
    alerta.textContent = mensagem;
    alerta.className = `alerta mostrar ${tipo}`;
    alerta.style.display = 'block';

    setTimeout(() => {
        alerta.classList.remove("mostrar");
        setTimeout(() => alerta.style.display = 'none', 400);
    }, 3000);
}

// AO CARREGAR A PÁGINA, MOSTRA MENSAGEM DA SESSION
window.addEventListener("DOMContentLoaded", () => {
    const msg = sessionStorage.getItem("mensagem");
    const tipo = sessionStorage.getItem("tipoMensagem");

    if (msg) {
        mostrarAlerta(msg, tipo || "sucesso");
        sessionStorage.removeItem("mensagem");
        sessionStorage.removeItem("tipoMensagem");
    }
});