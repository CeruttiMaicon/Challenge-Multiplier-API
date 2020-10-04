# API Categorias

## Create

```url
http://localhost/category
```

### Request POST

```json
{
  "name": "Nome da categoria",
}
```

### Parameters OK
```json
{
    "success": true,
    "message": "Categoria criada com sucesso!",
    "data": {
        "name": "testee",
        "updated_at": "2020-10-04T12:22:53.000000Z",
        "created_at": "2020-10-04T12:22:53.000000Z",
        "id": 10
    }
}
```
> status 201

### Parameters Error
```json
{
    "success": "false",
    "message": "Erro na validação do formulário",
    "error_message": {
        "nome-do-campo": [
            "Descrição do erro"
        ]
    }
}
```
> status 422

## Update

```url
http://localhost/category/1
```
### Request POST

```json
{
  "id": 1,
  "name": "Novo nome da categoria",
}
```

### Parameters OK
```json
{
    "success": true,
    "message": "Categoria atualizada com sucesso!",
    "data": {
        "id": 1,
        "name": "Atualizado",
        "created_at": "2020-10-04T00:25:16.000000Z",
        "updated_at": "2020-10-04T11:53:31.000000Z"
    }
}
```
> status 200

### Parameters Error
```json
{
    "success": "false",
    "message": "Erro na validação do formulário",
    "error_message": {
        "name": [
            "O nome é obrigatório."
        ]
    }
}
```
> status 422

## Get

```url
http://localhost/category/1
```
### Request Get

### Parameters OK
```json
{
    "success": true,
    "data": {
        "id": 5,
        "name": "q1",
        "created_at": "2020-10-04T00:40:27.000000Z",
        "updated_at": "2020-10-04T00:40:27.000000Z"
    }
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

## GetAll

```url
http://localhost/category
```
### Request Get

### Parameters OK
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Nome categoria",
            "created_at": "2020-10-04T00:25:16.000000Z",
            "updated_at": "2020-10-04T11:53:31.000000Z"
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
    "message": "Erro ao buscar categorias",
    "error_message": "No query results for model [App\\Models\\Category] 55"
}
```
> status 404

## Delete

```url
http://localhost/category/1
```
### Parameters OK
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Nome categoria",
            "created_at": "2020-10-04T00:25:16.000000Z",
            "updated_at": "2020-10-04T11:53:31.000000Z"
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
    "message": "Erro ao buscar categorias",
    "error_message": "No query results for model [App\\Models\\Category] 55"
}
```
> status 404
