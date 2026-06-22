# Raízes do Nordeste API

## Descrição do Projeto

A API **Raízes do Nordeste** foi desenvolvida como parte de um projeto acadêmico com o objetivo de simular um sistema backend para gerenciamento de pedidos, produtos, unidades e pagamentos de forma que se adeque a empresa em constante expansão, Raízes do Nordeste.

O sistema foi projetado utilizando Laravel e PostgreSQL, aplicando conceitos de arquitetura em camadas, autenticação JWT, modelagem relacional e regras de negócio voltadas para controle de pedidos e pagamentos.

---

## Tecnologias Utilizadas

* PHP 8.2
* Laravel 12
* PostgreSQL
* JWT Auth
* Eloquent ORM
* Composer
* Postman
* DBeaver

---

## Funcionalidades Implementadas

### Autenticação

* Registro de usuários
* Login com JWT
* Rotas protegidas

---

### Gestão de Unidades

* Criar unidade
* Listar unidades
* Atualizar unidade
* Remover unidade

---

### Gestão de Produtos

* Criar produto
* Listar produtos
* Atualizar produto
* Remover produto
* Paginação
* Filtros por nome

---

### Gestão de Pedidos

* Criar pedidos
* Adicionar múltiplos itens
* Calcular valor total
* Consultar pedidos
* Consultar pedidos do usuário autenticado

---

### Gestão de Pagamentos

* Pagamento mock
* Atualização de status do pedido
* Bloqueio de pagamento duplicado

---

### Controle de Estoque

* Redução automática após criação do pedido

---

## Arquitetura do Sistema

O projeto foi desenvolvido utilizando arquitetura em camadas:

### Controllers

Responsáveis por receber requisições HTTP e retornar respostas JSON.

* AuthController
* UnidadeController
* ProdutoController
* PedidoController
* PagamentoController

---

### Models

Representam as entidades principais do sistema.

* User
* Unidade
* Produto
* Pedido
* PedidoItem
* Pagamento

---

### Banco de Dados

Banco relacional PostgreSQL com integridade referencial via chaves estrangeiras.

---

## Estrutura do Banco

Entidades principais:

* users
* unidades
* produtos
* pedidos
* pedido_items
* pagamentos

Relacionamentos:

* User 1:N Pedidos
* Unidade 1:N Produtos
* Pedido 1:N PedidoItems
* Produto 1:N PedidoItems
* Pedido 1:1 Pagamento

---

## Instalação

### 1. Clonar projeto

Com Powershell:

```bash
git clone URL_DO_REPOSITORIO
```

---

### 2. Entrar na pasta

```bash
cd raizes-backend
```

---

### 3. Instalar dependências

```bash
composer install
```

---

### 4. Configurar ambiente

Criar arquivo:

```bash
.env
```

Exemplo:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=raizes_do_nordeste_henrique
DB_USERNAME=postgres
DB_PASSWORD=123456
```

---

### 5. Gerar chave da aplicação

```bash
php artisan key:generate
```

---

### 6. Gerar chave JWT

```bash
php artisan jwt:secret
```

---

### 7. Rodar migrations

```bash
php artisan migrate
```

---

### 8. Iniciar servidor

```bash
php artisan serve
```

Servidor:

```text
http://127.0.0.1:8000
```

---

## Endpoints Principais

### Autenticação

POST /api/register

POST /api/login

---

### Unidades

GET /api/unidades

POST /api/unidades

PUT /api/unidades/{id}

DELETE /api/unidades/{id}

---

### Produtos

GET /api/produtos

POST /api/produtos

PUT /api/produtos/{id}

DELETE /api/produtos/{id}

---

### Pedidos

GET /api/pedidos

POST /api/pedidos

GET /api/meus-pedidos

---

### Pagamentos

POST /api/pedidos/{id}/pagamento

---

## Regras de Negócio

* Cada usuário pode realizar vários pedidos.
* Cada pedido pode conter múltiplos produtos.
* Cada produto pertence a uma unidade.
* Cada pedido possui apenas um pagamento.
* O estoque é reduzido automaticamente após criação do pedido.
* Um pedido pago não pode ser pago novamente.
* O sistema registra a origem do pedido através do campo `canal_pedido`.

---

## Segurança

* Autenticação JWT
* Rotas protegidas
* Hash de senha com Bcrypt
* Isolamento de dados por usuário
* Integridade referencial
* Conformidade básica com LGPD

---

## Testes

O sistema possui testes funcionais documentados em:

```text
docs/testes.md
```

Casos cobertos:

* Registro de usuário
* Login válido
* Login inválido
* CRUD de unidades
* CRUD de produtos
* Criação de pedidos
* Redução de estoque
* Consulta de pedidos autenticados
* Pagamento mock
* Bloqueio de pagamento duplicado

---

## Autor

Henrique de Araujo Griebeler
4462954
