# Usuários

## Create

```url
http://localhost/api/register
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
    "user": {
        "name": "John Snow",
        "email": "john@gmail.com",
        "updated_at": "2020-10-04T17:26:43.000000Z",
        "created_at": "2020-10-04T17:26:43.000000Z",
        "id": 2
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FwaVwvcmVnaXN0ZXIiLCJpYXQiOjE2MDE4MzI0MDMsImV4cCI6MTYwMTgzNjAwMywibmJmIjoxNjAxODMyNDAzLCJqdGkiOiIzdkVIeDg1bHpTR2JOSUlGIiwic3ViIjoyLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.g7B4x0c5G02_ywYgjEAdc3YpMGSaBQC5e93iSJiwVGM"
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
