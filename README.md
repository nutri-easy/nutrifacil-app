
# 🍽️ NutriFácil

**NutriFácil** é um sistema web para criação de planos alimentares personalizados.  
O usuário informa dados como peso, altura, idade, sexo, tipo de dieta, preferências e restrições alimentares. O sistema gera um plano nutricional adequado, que pode ser enviado por e-mail ou WhatsApp.

---

## 🚀 Tecnologias usadas

- **PHP 8.x**
- **MySQL**
- **HTML5, CSS3, JavaScript**
- **PHPMailer** (envio de e-mails)
- **Git + GitHub Projects** (controle de versão e gestão de tarefas)

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
➡ Acesse: [http://localhost:8000](http://localhost:8000)

---

## 🧪 Como rodar os testes

- **Funcionalidade:** Acesse `tests/funcionalidade.md`, siga os cenários Gherkin e registre os resultados.
- **Usabilidade:** Use os formulários em `tests/usabilidade/` durante os testes com participantes.
- **Bugs:** Registre os bugs como *issues* no GitHub e referencie no relatório de testes.

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
├── LICENSE
├── .gitignore
├── .gitattributes
└── README.md
```

---

## 🔗 Link do GitHub Project

👉 [https://github.com/orgs/nutri-easy/projects/1](https://github.com/orgs/nutri-easy/projects/1)

---

## 🌐 Demo

👉 *link da demo disponivel em breve*  

---

## 📜 Licença

Este projeto está protegido por **All Rights Reserved**.  
Consulte o arquivo [LICENSE](./LICENSE) para mais informações.

---

## 📬 Contato

Para mais informações ou permissões de uso, entre em contato:  
📧 **caiomagalhaesrabelooliveira10@gmail.com**

---

## 👥 Equipe

- Caio Magalhães Rabelo Oliveira  
- Marcos Paulo Correa Mendes  
- Caio Henrique Fernandes de Almeida  
- Roger Freitas  

---

## 📌 Observações

Este projeto foi desenvolvido como atividade acadêmica para prática de:
- Desenvolvimento web
- Testes de usabilidade
- Trabalho colaborativo com GitHub Projects
