# Usuários

## Login

```url
http://localhost/api/login
```

### Request POST

```json
{
  "email": "john@gmail.com",
  "password": "secret",
}
```

### Parameters OK
```json
{
    "success": true,
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FwaVwvbG9naW4iLCJpYXQiOjE2MDE4MzQwMTIsImV4cCI6MTYwMTgzNzYxMiwibmJmIjoxNjAxODM0MDEyLCJqdGkiOiJnUlI5NUZSTnRHRHZRUFhuIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.utB7FD05qt0SYW3E6---NfnL0T7tFa-AL2i34NG5FhQ"
}
```
> status 200

### Parameters Error
```json
{
    "success": false,
    "error": "Mensagem de erro"
}
```
> status 400

## Create

```url
http://localhost/api/user
```

### Request POST

```json
{
  "name": "John Snow",
  "email": "john@gmail.com",
  "password": "secret",
  "password_confirmation": "secret",
}
```

### Parameters OK
```json
{
    {
    "success": true,
    "data": {
        "name": "Maicon",
        "email": "maicon@gmail.com",
        "updated_at": "2020-10-10T15:00:44.000000Z",
        "created_at": "2020-10-10T15:00:44.000000Z",
        "id": 2
    }
}
}
```
> status 201

### Parameters Error
```json
{
    "success": false,
    "message": "Erro na validação do formulário",
    "error_message": {
        "campo": [
            "Mensagem de erro"
        ]
    }
}
```
> status 400


## Update

```url
http://localhost/api/user/1
```

### Request POST

```json
{
  "name": "John Snow",
  "email": "john@gmail.com",
  "password": "secret",
  "password_confirmation": "secret",
}
```

### Parameters OK
```json
{
    {
    "success": true,
    "data": {
        "name": "Maicon",
        "email": "maicon@gmail.com",
        "updated_at": "2020-10-10T15:00:44.000000Z",
        "created_at": "2020-10-10T15:00:44.000000Z",
        "id": 1
    }
}
}
```
> status 201

### Parameters Error
```json
{
    "success": false,
    "message": "Erro na validação do formulário",
    "error_message": {
        "campo": [
            "Mensagem de erro"
        ]
    }
}
```
> status 400

## Get

```url
http://localhost/api/user/1
```

### Request GET 

### Parameters OK
```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "Maicon Lala",
        "email": "maicon44a432a34@gmail.com",
        "email_verified_at": "2020-10-08T21:41:34.000000Z",
        "created_at": "2020-10-08T21:41:34.000000Z",
        "updated_at": "2020-10-10T17:11:40.000000Z"
    }
}
```
> status 200

### Parameters Error
```json
{
    "success": false,
    "message": "Erro ao buscar usuário",
    "error_message": "Mensagem de erro"
}
```
> status 422


## GetAll

```url
http://localhost/api/user
```

### Request GET 

### Parameters OK
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Maicon Cerutti",
            "email": "desafio@multiplier.com",
            "email_verified_at": "2020-10-08T21:41:34.000000Z",
            "created_at": "2020-10-08T21:41:34.000000Z",
            "updated_at": "2020-10-10T17:11:40.000000Z"
        },
        ...
    ]
}
```
> status 200

### Parameters Error
```json
{
    "success": false,
    "message": "Erro ao buscar usuários",
    "error_message": "Mensagem de erro"
}
```
> status 422

## Delete

```url
http://localhost/api/user/1
```
### Parameters OK
```json
{
    "success": true,
    "message": "Usuário deletado"
}
```
> status 200

### Parameters Error
```json
{
    "success": false,
    "message": "Erro ao deletar usuário",
    "error_message": "Mensagem de erro"
}
```
> status 404
