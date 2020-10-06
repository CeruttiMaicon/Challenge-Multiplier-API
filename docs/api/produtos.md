# Produtos

## Create

```url
http://localhost/api/product
```

### Request POST

```json
{
  "name": "Nome do Produto",
  "value": "500",
  "category_id": "1",
}
```

### Parameters OK
```json
{
    "success": true,
    "message": "Produto criado com sucesso!",
    "data": {
        "name": "Novo",
        "value": "500",
        "category_id": "1",
        "updated_at": "2020-10-04T17:03:01.000000Z",
        "created_at": "2020-10-04T17:03:01.000000Z",
        "id": 1
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
> status 422

## Update

```url
http://localhost/api/product/1
```

### Request PATCH or PUT

```json
{
  "name": "Nome atualizado do Produto",
  "value": "501",
  "category_id": "1",
}
```

### Parameters OK
```json
{
    "success": true,
    "message": "Produto atualizado com sucesso!",
    "data": {
        "id": 1,
        "category_id": "1",
        "name": "Produto atualizado",
        "value": "20",
        "deleted_at": null,
        "created_at": "2020-10-04T17:03:01.000000Z",
        "updated_at": "2020-10-04T17:10:08.000000Z"
    }
}
```
> status 200

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
> status 422

## Get

```url
http://localhost/api/product/1
```

### Request GET 

### Parameters OK
```json
{
    "success": true,
    "data": {
        "id": 1,
        "category_id": 1,
        "name": "Produto atualizado",
        "value": "20.00",
        "deleted_at": null,
        "created_at": "2020-10-04T17:03:01.000000Z",
        "updated_at": "2020-10-04T17:10:08.000000Z"
    }
}
```
> status 200

### Parameters Error
```json
{
    "success": false,
    "message": "Erro ao buscar produto",
    "error_message": "No query results for model [App\\Models\\Product] 2"
}
```
> status 422

## GetAll

```url
http://localhost/api/product
```
### Request Get

### Parameters OK
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "category_id": 1,
            "name": "Produto atualizado",
            "value": "20.00",
            "deleted_at": null,
            "created_at": "2020-10-04T17:03:01.000000Z",
            "updated_at": "2020-10-04T17:10:08.000000Z"
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
    "message": "Erro ao buscar produtos",
    "error_message": "Mensagem de erro"
}
```
> status 404

## Delete

```url
http://localhost/api/product/1
```
### Parameters OK
```json
{
    "success": true,
    "message": "Produto deletado"
}
```
> status 200

### Parameters Error
```json
{
    "success": false,
    "message": "Erro ao deletar produto",
    "error_message": "Mensagem de erro"
}
```
> status 404
