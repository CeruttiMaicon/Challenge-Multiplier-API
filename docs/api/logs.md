# Logs

## GetAll

```url
http://localhost/api/log
```
### Request Get

### Parameters OK
```json
{
    "success": true,
    "message": "Pedido atualizado com sucesso!",
    "data": [
        {
            "id": 1,
            "instance": "f933a0349d23",
            "channel": "my.channel",
            "level": "INFO",
            "message": "O usuário Maicon Cerutti [desafio@multiplier.com] atualizou a categoria Higiene nova",
            "context": "{\"new\":\"{\\\"id\\\":1,\\\"name\\\":\\\"Higiene nova\\\",\\\"deleted_at\\\":null,\\\"created_at\\\":\\\"2020-10-10T18:40:11.000000Z\\\",\\\"updated_at\\\":\\\"2020-10-10T18:41:15.000000Z\\\"}\",\"old\":\"{\\\"id\\\":1,\\\"name\\\":\\\"Higiene\\\",\\\"deleted_at\\\":null,\\\"created_at\\\":\\\"2020-10-10T18:40:11.000000Z\\\",\\\"updated_at\\\":\\\"2020-10-10T18:40:11.000000Z\\\"}\"}",
            "created_at": "2020-10-10T18:41:15.000000Z",
            "updated_at": "2020-10-10T18:41:15.000000Z"
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
    "message": "Erro ao buscar categoria",
    "error_message": "No query results for model [App\\Models\\Category] 55"
}
```
> status 404
