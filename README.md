# 🧾 Tradição Brasileira - Plataforma de Receitas Tradicionais Regionais
<p align="center">
  <img src="public\img\logo_v3.png" alt="Logo do Projeto" width="200">
</p>

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

**Tenha certeza que sua máquina tenha o Laravel, PHP, Postgresql e Node.js instalados**

```bash
# Clone o repositório
git clone https://github.com/AnaNovello/Receitas-Tradicionais

# Acesse o diretório do projeto
cd seu-projeto

# Instale as dependências do PHP
composer install

# Instale as dependências do frontend
npm install 
npm run build

# Copie o arquivo de ambiente e configure
copy .env.example .env
php artisan key:generate

# Configure as variáveis do banco de dados no .env
DB_CONNECTION=pgsql
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# Execute as migrações
php artisan migrate

# Execute o comando para criar um link simbolico para o diretório de mídia
php artisan storage:link

# Rode o servidor de desenvolvimento
php artisan serve
```
---
## Observações
- Quando realizar alguma modificação de estilização utilizando Tailwind CSS, dependendo do navegador utilizado para os testes, é necessário executar o comando ```npm run build``` novamente para que a modificação seja aplicada;
- Por padrão, todos os usuários cadastrados são do tipo comum. Para definir um usuário como administrador, basta utilizar o comando ```php artisan tinker``` para modificar o atributo ```usertype``` de um usuário:
```bash
$user = \App\Models\User::find(1);
$user->usertype = 'admin';
$user->save();
```