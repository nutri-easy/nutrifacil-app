
# 🍽️ NutriFácil

**NutriFácil** é um sistema web para criação de planos alimentares personalizados. O usuário informa dados como peso, altura, idade, sexo, tipo de dieta e preferências alimentares. O sistema gera um plano nutricional adequado, que pode ser enviado por e-mail ou WhatsApp.

---

## 🚀 Tecnologias usadas

- **PHP 8.x**
- **MySQL / MariaDB**
- **HTML5, CSS3, JavaScript**
- **PHPMailer** (para envio de e-mails)
- **Git + GitHub Projects** (controle de versão e gerenciamento)

---

## ⚙️ Como executar o projeto

1️⃣ Clone o repositório:
```bash
git clone https://github.com/nutri-easy/nutrifacil-app.git
```

2️⃣ Configure o banco no arquivo `src/config.php`:
```php
$host = "localhost";
$usuario = "seu_usuario";
$senha = "sua_senha";
$banco = "seu_banco";
```

3️⃣ Importe o arquivo `database.sql` no seu MySQL (phpMyAdmin ou terminal).

4️⃣ Rode o servidor local:
```bash
php -S localhost:8000
```
➡ Acesse em [http://localhost:8000](http://localhost:8000)

---

## 🧪 Como rodar os testes

- **Funcionalidade:** acesse `tests/funcionalidade.md`, siga os cenários em Gherkin e registre o resultado.
- **Usabilidade:** use os formulários em `tests/usabilidade/` para aplicar os testes com participantes.
- **Bugs:** registre os bugs encontrados como issues no GitHub com links no relatório de testes.

---

## 📂 Estrutura do repositório

```
nutrifacil/
├── public/
│   ├── index.php
│   └── css/
│       └── style.css
├── src/
│   ├── config.php
│   ├── controllers/
│   ├── views/
│   └── utils/
├── tests/
│   ├── funcionalidade.md
│   └── usabilidade/
├── slides/
│   └── apresentacao.pdf
├── database.sql
├── .gitignore
├── .gitattributes
└── README.md
```

---

## 🔗 Link do GitHub Project

👉 [https://github.com/orgs/nutri-easy/projects/1](https://github.com/orgs/nutri-easy/projects/1)

---

## 👥 Equipe

- Nome 1
- Nome 2
- Nome 3
- Nome 4
- Nome 5
- Nome 6

---

## 📌 Observações

Este projeto foi desenvolvido como atividade acadêmica para prática de desenvolvimento web, testes de usabilidade e trabalho colaborativo com GitHub Projects.
