# 🧾 Tradição Brasileira - Plataforma de Receitas Tradicionais Regionais

## 📖 Descrição

O projeto **Tradição Brasileira** é uma aplicação web desenvolvida com Laravel, Tailwind CSS e PostgreSQL. Seu objetivo é preservar e compartilhar receitas típicas das cinco regiões do Brasil, promovendo a valorização da cultura gastronômica brasileira.

A plataforma permite que usuários explorem receitas, salvem suas favoritas, entrem em contato com a equipe de desenvolvimento e contribuam com novas receitas.

---

## 🚀 Funcionalidades

- 🔍 Filtro de receitas por região: Norte, Nordeste, Centro-Oeste, Sudeste e Sul;
- 📝 Visualização detalhada das receitas;
- 📦 Cadastro de novas receitas (restrito a administradores);
- ❤️ Salvamento de receitas por usuários logados;
- 👤 Área de perfil com lista de receitas salvas;
- 📬 Formulário para reportar problemas ou se candidatar à equipe;
- 🔐 Login, registro e autenticação de usuários.

---

## 🛠️ Tecnologias Utilizadas

- [Laravel 11.35.1](https://laravel.com/)
- [PHP 8.2.12](https://www.php.net/)
- [Tailwind CSS](https://tailwindcss.com/)
- [PostgreSQL 17](https://www.postgresql.org/)
- Blade Components
- JavaScript (para interações simples)

---

## ⚙️ Instalação e Execução

Siga os passos abaixo para executar o projeto localmente. **Tenha certeza de ter instalado o Laravel e o PHP em sua máquina antes de prosseguir**

```bash

# Clone o repositório
git clone https://github.com/seu-usuario/seu-projeto.git

# Acesse o diretório do projeto
cd seu-projeto

# Instale as dependências do PHP
composer install

# Instale as dependências do frontend
npm install && npm run dev

# Copie o arquivo de ambiente e configure
cp .env.example .env
php artisan key:generate

# Configure as variáveis do banco de dados no .env
DB_CONNECTION=pgsql
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# Execute as migrações
php artisan migrate

# Rode o servidor de desenvolvimento
php artisan serve
