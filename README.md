# sport

1. baixar repositório
2. criar diretório */mysql* na raíz do projeto 
3. docker-compose up -d --build
4. docker-compose run --rm composer update
5. docker-compose run --rm artisan test 
6. docker-compose run --rm artisan migrate:fresh --seed

# Ligar filas
docker-compose run --rm artisan queue:work

# Importar times
docker-compose run --rm artisan app:create-teams

# Importar players
docker-compose run --rm artisan app:create-players

# Importar Games
docker-compose run --rm artisan app:create-games

# A documentação das requisições (Login, logout e criar, editar, remover, listar Players)

https://documenter.getpostman.com/view/3863148/2sAYX5KhLy
