## Sistema loja de calçados

API Rest desenvolvida com Laravel, com o propósito de atender uma loja de calçados, com gestão de produtos e pedidos.

### Pre requisitos

- PHP 7.4 ou superior
- Composer

### Utilização

- Clonar este repositório.

- Entrar no diretório e criar um arquivo .env

- Executar os comandos:

```
composer install

php artisan key:generate

php artisan jwt:secret

php artisan serve
```

## Endpoints

É necessário estar logado como vendedor para acessar as rotas, primeiro acesse a seguinte rota:

### Login

```
POST - http://localhost:8000/api/login
```

- Body:

```
{
    "email": "vendedor1@loja.com",
    "password": "123456"
}
```

Ao acessar a rota acima, será gerado um **access_token**. Esse token deverá ser enviado como cabeçalho em todas as próximas requisições, dessa forma:

```
Authorization: Bearer {access_token}
```

### Listar produtos:

```
GET - http://localhost:8000/api/v1/products
```

### Buscar um produto:

```
GET - http://localhost:8000/api/v1/products/{id}
```

### Atualizar um produto:
```
PUT - http://localhost:8000/api/v1/products/{id}
```

- Body:

```
{
    "name": "Teste",
    "lot_id": 1,
    "color": "Cinza",
    "description": "foo bar",
    "price": 456.78
}
```

### Listar pedidos:

```
GET - http://localhost:8000/api/v1/orders
```

### Buscar um pedido:

```
GET - http://localhost:8000/api/v1/orders/{id}
```

### Atualizar um pedido:
```
PUT - http://localhost:8000/api/v1/orders/{id}
```

- Body:

```
{
    "customer_document": "987.654.321-01",
    "seller_id": 1
}
```

### Relatório de pedidos:

```
GET - http://localhost:8000/api/v1/orders/reports
```

### Inserir um item no pedido:

```
POST - http://localhost:8000/api/v1/orders/items
```

- Body:

```
{
    "order_id": 1,
    "product_id": 5
}
```

### Remover item do pedido
```
DELETE - http://localhost:8000/api/v1/orders/items/{itemId}
```
