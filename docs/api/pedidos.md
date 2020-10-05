# Pedidos

## Create

```url
http://localhost/api/order
```

### Request POST

```json
{
  "user_id": 1,
  "products[0]": 60,
  "products[1]": 62,
  "quantity[0]": 6,
  "quantity[1]": 2,
}
```

### Parameters OK
```json
{
    "success": true,
    "message": "Pedido criado com sucesso!",
    "data": {
        "user_id": "1",
        "updated_at": "2020-10-04T21:33:42.000000Z",
        "created_at": "2020-10-04T21:33:42.000000Z",
        "id": 5,
        "products": [
            {
                "id": 60,
                "category_id": 5,
                "name": "Produto 60",
                "value": "39.00",
                "deleted_at": null,
                "created_at": "2020-10-04T21:20:01.000000Z",
                "updated_at": "2020-10-04T21:20:01.000000Z",
                "pivot": {
                    "order_id": 5,
                    "product_id": 60,
                    "value": "39.00",
                    "created_at": "2020-10-04T21:33:42.000000Z",
                    "updated_at": "2020-10-04T21:33:42.000000Z"
                }
            },
            ...
        ]
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
http://localhost/api/order/1
```

### Request PATCH or PUT

```json
{
  "user_id": 1,
  "products[0]": 60,
  "products[1]": 62,
  "quantity[0]": 6,
  "quantity[1]": 2,
}
```

### Parameters OK
```json
{
    "success": true,
    "message": "Pedido atualizado com sucesso!",
    "data": {
        "id": 1,
        "user_id": "1",
        "deleted_at": null,
        "created_at": "2020-10-04T22:16:19.000000Z",
        "updated_at": "2020-10-04T22:16:19.000000Z",
        "products": [
            {
                "id": 2,
                "category_id": 3,
                "name": "Produto 2",
                "value": "27.00",
                "deleted_at": null,
                "created_at": "2020-10-04T22:16:14.000000Z",
                "updated_at": "2020-10-04T22:16:14.000000Z",
                "pivot": {
                    "order_id": 1,
                    "product_id": 2,
                    "value": "27.00",
                    "quantity": 20,
                    "created_at": "2020-10-05T01:44:30.000000Z",
                    "updated_at": "2020-10-05T01:44:50.000000Z"
                }
            },
            ...
        ]
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

## Get

```url
http://localhost/api/order/1
```

### Request GET 

### Parameters OK
```json
{
    "success": true,
    "data": {
        "id": 15,
        "user_id": 1,
        "deleted_at": null,
        "created_at": "2020-10-05T01:19:57.000000Z",
        "updated_at": "2020-10-05T01:19:57.000000Z",
        "value_total": 266,
        "quantity_total": 3,
        "products": [
            {
                "id": 60,
                "category_id": 4,
                "name": "Produto 60",
                "value": "100.00",
                "deleted_at": null,
                "created_at": "2020-10-04T22:16:14.000000Z",
                "updated_at": "2020-10-04T22:16:14.000000Z",
                "pivot": {
                    "order_id": 15,
                    "product_id": 60,
                    "value": "100.00",
                    "quantity": 1,
                    "created_at": "2020-10-05T01:19:57.000000Z",
                    "updated_at": "2020-10-05T01:19:57.000000Z",
                    "sub_total": 100
                }
            },
            ...
        ]
    }
}
```
> status 200

### Parameters Error
```json
{
    "success": false,
    "message": "Erro ao buscar pedido",
    "error_message": "Mensagem de erro"
}
```
> status 422

## GetAll

```url
http://localhost/api/order
```
### Request Get

### Parameters OK
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "total": "50.00",
            "deleted_at": null,
            "created_at": "2020-10-05T02:33:57.000000Z",
            "updated_at": "2020-10-05T02:33:57.000000Z"
        }
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
    "message": "Pedido deletado"
}
```
> status 200

### Parameters Error
```json
{
    "success": false,
    "message": "Erro ao deletar pedido",
    "error_message": "Mensagem de erro"
}
```
> status 404
