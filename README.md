<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Desafio Multiplier

## Start Projeto

Clone o projeto.

```git
git clone https://github.com/CeruttiMaicon/Challenge-Multiplier.git
```

Para montar a infraestrutura de desenvolvimento eu utilizei o Laradock.

Clone o Laradock como submodulo utilizando o seguinte comando:

```cmd
git submodule init
git submodule update
```
### Configurações

Entre na pasta laradock e copie env-example para .env

```cmd
cp laradock/env-example laradock/.env
```

Verifique estes parâmetros no arquivo laradock/.env
> Se não estiverem com os valores abaixo faça mude-os
```.env
...
PHP_VERSION=7.3
...
MYSQL_VERSION=5.7
...
```

Agora utilize o docker deste submodulo com o comando:
> Isso pode levar alguns minutos (busque um café hehe).
```docker-compose
docker-compose up -d nginx mysql phpmyadmin portainer
```

Acesse o container de desenvolvimento.
> Ele já possui todas as ferramentas necessárias instaladas

```cmd
docker exec -it laradock_workspace_1 bash
```

Agora instale as dependências do projeto .
```cmd
composer install && yarn

```

Agora tudo já deve estar rodando certinho para o back-end :)

Para documentação do projeto e da API do back-end eu criei uma documentação utilizando o VuePress. Para utiliza-la basta executar:

```cmd
yarn docs:dev
```

> A aplicação VuePress estará disponível em http://localhost:8080
