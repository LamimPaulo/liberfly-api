# Teste Laravel com Docker

Este projeto é uma API Laravel configurada para funcionar em um ambiente Docker. O README abaixo fornece instruções sobre como configurar, executar e testar o projeto.

## Pré-requisitos

Antes de começar, você precisará ter o Docker e o Docker Compose instalados em sua máquina. Você pode baixar e instalar o Docker a partir do [site oficial do Docker](https://www.docker.com/products/docker-desktop).

## Configuração do Projeto

1. **Clone o repositório**

   Clone o repositório do projeto para sua máquina local:
   ```bash
   git clone https://github.com/LamimPaulo/liberfly-api.git
   cd liberfly-api
    ```
    
1. **Configure o .env**

   O projeto já inclui um arquivo de exemplo .env.example. Copie este arquivo para criar um novo arquivo .env:
   ```bash
   cp .env.example .env
   ```

   Configure as variáveis de ambiente no arquivo .env conforme necessário. As configurações padrão devem funcionar para a maioria dos casos.

3. **Construa e inicie os containers Docker**

    Use o Docker Compose para construir e iniciar os containers:

    ```bash
    docker-compose up -d
    ```

    O comando acima construirá as imagens Docker e iniciará os serviços definidos no docker-compose.yml.

4. **Rode migrations e seeders**
    Rode as migrations e seeders para ter os dados necessarios

    ```bash
     docker-compose exec app php artisan migrate --seed
    ```

## Testes de integracão
Rode os testes de dentro do container do laravel
    
    ```bash
     docker-compose exec app php artisan test
    ```

## Endpoints da API

O Swagger UI estará disponível em [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation). Você pode usar o Swagger UI para explorar e testar os endpoints da API.

### Endpoints Disponíveis

- **Login**
  - **Método:** POST
  - **Endpoint:** `/api/login`
  - **Descrição:** Autentica o usuário e retorna um token JWT.
  - **Corpo da Requisição:**
    ```json
    {
      "email": "test@example.com",
      "password": "password123"
    }
    ```

- **Logout**
  - **Método:** POST
  - **Endpoint:** `/api/logout`
  - **Descrição:** Invalida o token JWT.
  - **Cabeçalhos:** 
    - `Authorization: Bearer <TOKEN_JWT>`

- **Obter detalhes do usuário**
  - **Método:** GET
  - **Endpoint:** `/api/me`
  - **Descrição:** Retorna os detalhes do usuário autenticado.
  - **Cabeçalhos:** 
    - `Authorization: Bearer <TOKEN_JWT>`

- **Listar todos os itens**
  - **Método:** GET
  - **Endpoint:** `/api/items`
  - **Descrição:** Lista todos os itens no banco de dados.
  - **Cabeçalhos:** 
    - `Authorization: Bearer <TOKEN_JWT>`

- **Obter um item por ID**
  - **Método:** GET
  - **Endpoint:** `/api/items/{id}`
  - **Descrição:** Retorna os detalhes de um item específico.
  - **Parâmetros de Rota:** 
    - `id` (integer) - ID do item
  - **Cabeçalhos:** 
    - `Authorization: Bearer <TOKEN_JWT>`



## Parar e Remover os Containers
Para parar e remover os containers Docker, use:
```bash
docker-compose down
```

## Notas Adicionais
- O Dockerfile utiliza a imagem base php:8.2-fpm e instala as dependências necessárias para o Laravel, incluindo o Composer.
- o email e senha do placeholder no login é o usuario criado na seeder.
- "docker-compose exec app bash" é o comando para entrar no container do laravel a qualquer momento
- para mais informacões, duvidas, ou qualquer esclarecimento, entrar em contato pelo robertolamim@gmail.com ou contato@prlamim.com.br