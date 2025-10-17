📘 Projeto PHP – Sistema de Cadastro de Usuários

Um simples sistema em PHP com integração a banco de dados MySQL, que permite visualizar e cadastrar usuários.
O projeto é ideal para estudos de CRUD (Create, Read), conexão com banco de dados e manipulação de formulários em PHP.

🚀 Funcionalidades

✅ Exibir todos os usuários cadastrados em uma tabela

✅ Adicionar novos usuários (nome e e-mail)

✅ Botão para retornar à página inicial

✅ Conexão com o banco de dados utilizando PDO

✅ Interface simples e organizada com HTML e CSS

🗂️ Estrutura do Projeto
📦 Google-Maps (ou nome do seu repositório)
 ┣ 📜 index.php          → Página principal que exibe a lista de usuários
 ┣ 📜 add.php            → Página para cadastrar um novo usuário
 ┣ 📜 banco.php          → Arquivo de conexão com o banco de dados (PDO)
 ┣ 📜 style.css          → Estilos básicos da interface
 ┗ 📜 README.md          → Este arquivo de documentação

⚙️ Requisitos

Antes de rodar o projeto, você precisa ter instalado:

🧰 XAMPP
 ou outro servidor PHP

🐬 Banco de dados MySQL

💻 Navegador web (Google Chrome, Edge, etc.)

💾 Configuração do Banco de Dados

Abra o phpMyAdmin (geralmente em http://localhost/phpmyadmin)

Crie o banco de dados:

CREATE DATABASE db_aula;


Crie a tabela de usuários:

USE db_aula;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL
);


Verifique se o arquivo banco.php está configurado corretamente com:

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_aula";

▶️ Como Executar o Projeto

Copie a pasta do projeto para o diretório:

C:\xampp\htdocs\


Inicie o Apache e o MySQL no painel do XAMPP.

Acesse no navegador:

http://localhost/Google-Maps/index.php


Clique em “Adicionar Novo Usuário” para cadastrar novos registros.

Use o botão “Voltar para a Página Inicial” em add.php para retornar à lista.

🧠 Aprendizados

Esse projeto reforça conceitos importantes como:

Estrutura básica de um CRUD em PHP

Uso de PDO para acesso seguro ao banco de dados

Validação e sanitização de dados (filter_input)

Organização de código entre arquivos (index.php, add.php, banco.php)

🛠️ Tecnologias Utilizadas
Tecnologia	Descrição
PHP 8+	Linguagem principal do projeto
MySQL	Banco de dados relacional
HTML5 / CSS3	Estrutura e estilo das páginas
XAMPP	Servidor local com Apache e MySQL
👨‍💻 Autor

Lucas dos Santos Costa
📍 Estudante de Análise e Desenvolvimento de Sistemas
💡 Apaixonado por tecnologia, programação e desenvolvimento web

🔗 GitHub: @Lucass09876

📜 Licença

Este projeto é livre para uso educacional e pode ser adaptado para estudos e melhorias.
Sinta-se à vontade para clonar, editar e aprender com ele! 🚀