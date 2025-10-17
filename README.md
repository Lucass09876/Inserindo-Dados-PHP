📘 Sistema CRUD de Usuários em PHP
Mostrar Imagem
Mostrar Imagem
Mostrar Imagem
Mostrar Imagem
Sistema completo de gerenciamento de usuários desenvolvido em PHP com banco de dados MySQL. Implementa todas as operações CRUD (Create, Read, Update, Delete) com interface moderna e intuitiva.
🚀 Funcionalidades
✅ Listar Usuários - Visualização de todos os usuários cadastrados em tabela
✅ Cadastrar Usuário - Adicionar novos usuários com nome e e-mail
✅ Editar Usuário - Alterar dados de usuários existentes
✅ Excluir Usuário - Remover usuários com confirmação de segurança
✅ Mensagens de Feedback - Notificações de sucesso/erro em cada operação
✅ Validação de Dados - Sanitização e validação de inputs
✅ Segurança - Proteção contra SQL Injection e XSS
📸 Screenshots
Tela Principal - Lista de Usuários
Mostrar Imagem
Tela de Cadastro
Mostrar Imagem
Tela de Edição
Mostrar Imagem
🗂️ Estrutura do Projeto
📦 crud-php-usuarios/
 ┣ 📜 index.php          # Página principal - Lista de usuários
 ┣ 📜 add.php            # Cadastro de novo usuário
 ┣ 📜 editar.php         # Edição de usuário existente
 ┣ 📜 excluir.php        # Exclusão de usuário
 ┣ 📜 banco.php          # Conexão com banco de dados (PDO)
 ┣ 📜 style.css          # Estilos CSS (opcional)
 ┗ 📜 README.md          # Documentação do projeto
🛠️ Tecnologias Utilizadas
TecnologiaDescriçãoPHP 8+Linguagem principal do backendMySQLBanco de dados relacionalPDOInterface de acesso ao banco (segura)HTML5Estrutura das páginasCSS3Estilização moderna e responsivaJavaScriptConfirmação de exclusão
💾 Configuração do Banco de Dados
1. Criar o Banco de Dados
Abra o phpMyAdmin e execute o seguinte SQL:
sqlCREATE DATABASE db_aula;

USE db_aula;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
2. Configurar Conexão
No arquivo banco.php, ajuste as credenciais se necessário:
php$host = 'localhost';
$dbname = 'db_aula';
$username = 'root';
$password = '';
⚙️ Instalação e Execução
Pré-requisitos

🧰 XAMPP ou WAMP (Apache + MySQL + PHP)
💻 Navegador web moderno
📝 Editor de código (VS Code recomendado)

Passo a Passo
1️⃣ Clone o repositório
bashgit clone https://github.com/Lucass09876/crud-php-usuarios.git
2️⃣ Mova para o diretório do servidor
bash# Windows (XAMPP)
cp -r crud-php-usuarios C:\xampp\htdocs\

# Linux/Mac
cp -r crud-php-usuarios /opt/lampp/htdocs/
3️⃣ Configure o banco de dados

Acesse: http://localhost/phpmyadmin
Execute o SQL fornecido acima

4️⃣ Inicie o servidor

Abra o XAMPP Control Panel
Inicie Apache e MySQL

5️⃣ Acesse o sistema
http://localhost/crud-php-usuarios/index.php
📚 Como Usar
Cadastrar Novo Usuário

Na página inicial, clique em "Cadastro"
Preencha o nome e e-mail
Clique em "Gravar"
Usuário será adicionado à lista

Editar Usuário

Na lista de usuários, clique em "Editar"
Altere os dados desejados
Clique em "Salvar Alterações"
Dados serão atualizados

Excluir Usuário

Na lista de usuários, clique em "Deletar"
Confirme a exclusão
Usuário será removido permanentemente

🔒 Recursos de Segurança

✅ PDO com Prepared Statements - Previne SQL Injection
✅ filter_input() - Sanitiza dados de entrada
✅ htmlspecialchars() - Previne XSS
✅ Validação de tipos - Garante integridade dos dados
✅ Confirmação de exclusão - Evita remoção acidental

📊 Operações CRUD
OperaçãoArquivoMétodo HTTPSQLCreateadd.phpPOSTINSERTReadindex.phpGETSELECTUpdateeditar.phpPOSTUPDATEDeleteexcluir.phpGETDELETE
🎨 Características da Interface

🎯 Design minimalista e profissional
📱 Layout responsivo
🎨 Cores intuitivas (verde para sucesso, vermelho para exclusão)
⚡ Transições suaves
💬 Feedback visual em todas as ações
🖱️ Hover effects nos elementos interativos

🧠 Aprendizados
Este projeto reforça conceitos importantes:

Operações CRUD completas em PHP
Conexão segura com banco de dados usando PDO
Validação e sanitização de dados
Organização de código em múltiplos arquivos
Boas práticas de segurança web
Interface de usuário responsiva

🚧 Melhorias Futuras

 Sistema de autenticação (login/logout)
 Paginação de resultados
 Busca e filtros
 Upload de foto de perfil
 Exportação de dados (CSV/PDF)
 API RESTful
 Testes automatizados
 Docker para ambiente

👨‍💻 Autor
Lucas dos Santos Costa
📍 Estudante de Análise e Desenvolvimento de Sistemas
💡 Apaixonado por tecnologia e desenvolvimento web
Mostrar Imagem
Mostrar Imagem
📝 Licença
Este projeto é livre para uso educacional. Sinta-se à vontade para clonar, modificar e aprender! 🚀

⭐ Se este projeto te ajudou, considere dar uma estrela no repositório!
Desenvolvido com 💚 para fins educacionais