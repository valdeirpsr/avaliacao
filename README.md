
## Rotas

Seguem as rotas para as requisições

### Listar produtos

Na rota, `/` é possível listar todos os produtos cadastrados

```
GET / HTTP/1.1
Host: localhost:80
```

### Cadastrar produtos

Para cadastrar um produto, basta enviar uma requisição *POST* para `/new`

```
POST /new HTTP/1.1
Content-Length: 81
Content-Type: application/json
Host: localhost:80

{
    "description": "testes",
    "manufacturer": "Brastemp",
    "name": "teste",
    "voltage": "21"
}
```

### Editar produto

Para editar, basta enviar um *PUT* para `/edit/{productId}`

```
PUT /new/1 HTTP/1.1
Content-Length: 80
Content-Type: application/json
Host: localhost:80

{
    "description": "teste",
    "manufacturer": "Brastemp",
    "name": "teste",
    "voltage": "21"
}
```

### Remover um produto

Basta acessar `/delete/{productId}`, que o produto será removido

```
DELETE /delete/1 HTTP/1.1
Content-Length: 0
Host: localhost:80
```
