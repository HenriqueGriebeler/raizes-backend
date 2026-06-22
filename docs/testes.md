CT01 - Registro de usuário

Objetivo: Validar criação de novo usuário que deseja se registrar.

Entrada: POST /api/register
{
  "name": "Joao Silva",
  "email": "joaosilva@email.com",
  "password": "123456"
}

Resultado esperado: 201 Created
Usuário registrado com sucesso

CT02 - Login com credencial criada

Objetivo: Validar autenticação JWT.

Entrada: POST /api/login

{
  "email": "joaosilva@email.com",
  "password": "123456"
}

Resultado esperado: 200 OK
Token JWT retornado

CT03 - Login inválido

Objetivo: Validar verificação de credenciais.

Entrada: POST /api/login

{
  "email": "joaosilva@email.com",
  "password": "654321"
}

Resultado esperado: 401 Unauthorized
Credenciais inválidas

CT04 - Criar unidade

Objetivo: Cadastrar uma unidade operacional.

Entrada: POST /api/unidades

{
  "nome": "Unidade Centro",
  "endereco": "Rua Ramiro Barcelos, Centro, RS, Montenegro, 2201"
}

Resultado esperado: 201 Created
Unidade cadastrada

CT05 - Criar produto

Objetivo: Cadastrar os produtos existentes nas unidades.

Entrada: POST /api/produtos

{
  "nome": "Café clássico",
  "preco": 9.90,
  "estoque": 50,
  "unidade_id": 1
}

Resultado esperado: 201 Created

CT06 - Criar pedido com itens válidos

Objetivo: Realizar um pedido utilizando itens já existentes.

Entrada: POST /api/pedidos

{
  "cliente_id": 1,
  "canal_pedido": "APP",
  "itens": [
    {
      "produto_id": 1,
      "quantidade": 2
    }
  ]
}

Resultado esperado: 201 Created
Pedido criado


CT07 - Bloqueio por estoque insuficiente

Objetivo: Validar sistema que impede realizar pedido caso não haja estoque.

Entrada: POST /api/pedidos

{
  "cliente_id": 2,
  "canal_pedido": "APP",
  "itens": [
    {
      "produto_id": 1,
      "quantidade": 999
    }
  ]
}

Resultado esperado: 400 Bad Request
Estoque insuficiente

CT08 - Processamento de pagamento mock

Objetivo: Simular pagamento de pedido.

Entrada: POST /api/pedidos/1/pagamento

{
  "metodo": "PIX"
}

Resultado esperado: 200 OK
Pagamento aprovado
Status do pedido alterado para PAGO

CT09 - Bloqueio de pagamento duplicado

Objetivo: Impedir múltiplos pagamentos no mesmo pedido.

Entrada: POST /api/pedidos/1/pagamento

{
  "metodo": "PIX"
}

Resultado esperado: 400 Bad Request
Pedido já foi pago

CT10 - Produto para unidade invalida.

Entrada: POST /api/produtos

{
  "nome": "Produto Inválido",
  "preco": 15.90,
  "estoque": 20,
  "unidade_id": 999
}

Resultado esperado: 500 Internal server error
{
    "success": false,
    "message": "The selected unidade id is invalid."
}

CT11 - Listar unidades.
Entrada: GET /api/unidades

{
  "id" : 1,
  "nome" : "Unidade Central"
}