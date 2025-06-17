# 🧊 Pede Aí Ratinho

Sistema interno para realizar e organizar pedidos de açaí. Desenvolvido com foco em aprendizado em PHP, JavaScript e estrutura MVC básica.

## 🔧 Tecnologias Utilizadas

- HTML5 + CSS3
- JavaScript (básico) - Irei implementar
- PHP (sem frameworks)
- MySQL
- InfinityFree (hospedagem gratuita)

## 📦 Estrutura do Projeto

📁 assets/
│ └── css/
│ ├── layout.css
│ └── form.css
📁 config/
│ └── conexao.php
📁 controllers/
│ └── CadastrarPedidoController.php
│ └── LoginController.php
📁 models/
│ └── Pedido.php
📁 templates/
│ └── header.php
📁 views/
│ └── inicio.php
│ └── formulario.php
│ └── login.php
📄 index.php

less
Copiar
Editar

## 📋 Funcionalidades

- [x] Tela de login com senha única
- [x] Cadastro de pedidos com nome, tamanho, sabor, adicionais, pagamento e observações
- [x] Listagem dos pedidos na tela inicial
- [x] Ações de editar e excluir (em progresso)
- [x] Envio de pedidos para o WhatsApp
- [x] Design moderno e responsivo com animações

## 🌐 Hospedagem

O sistema está hospedado gratuitamente em:  
🔗 https://ped3-a1-rat1nh0.infinityfreeapp.com/area-51/views/login.php
## 🚀 Como rodar localmente

1. Clone o repositório:
git clone https://github.com/seuusuario/pede-ai-gazin.git

bash
Copiar
Editar

2. Importe o banco (`pedidos.sql`) no seu MySQL local.

3. Configure `config/conexao.php` com seus dados locais:
```php
$host = 'localhost';
$db = 'pedidos';
$user = 'root';
$pass = '';
Rode o projeto via localhost/pede-ai-gazin.

📄 Licença
Este projeto foi feito com fins educacionais e internos. Sinta-se livre para adaptá-lo ao seu uso.

yaml
Copiar
Editar

---

Se quiser que eu personalize com seu nome no GitHub, o domínio real ou a logo, só mandar! Posso até exportar em `.
