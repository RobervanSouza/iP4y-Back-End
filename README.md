# iP4y Back-End
# Projeto de Cadastro de Usuários em Laravel

Este projeto é uma aplicação em Laravel para gerenciar o cadastro de usuários. Ele oferece operações básicas de CRUD (Criar, Ler, Atualizar e Deletar) para manter registros de usuários. O sistema inclui validações abrangentes para garantir a integridade dos dados e está integrado a um banco de dados MySQL para persistência das informações.

## Funcionalidades Principais

- Cadastro e Edição de Usuários: Permite adicionar novos usuários ou editar informações existentes.
- Visualização Detalhada: Oferece uma interface intuitiva para visualizar detalhes dos usuários cadastrados.
- Exclusão de Usuários: Permite remover registros de usuários do sistema.

## Validações Avançadas

O sistema incorpora validações detalhadas para garantir a qualidade dos dados:

- **Validação de E-mail:** Verifica se o formato do e-mail é válido.
- **Validação de CPF:** Utiliza a biblioteca LaravelLegends\PtBrValidator para validar CPFs e evitar duplicatas no banco de dados.
- **Validação de Data de Nascimento:** Assegura que a data de nascimento seja uma data válida.

## Endpoints da API

- `GET /api/formulario`: Retorna todos os registros de usuários cadastrados.
- `GET /api/formulario/{id}`: Retorna os detalhes de um usuário específico.
- `POST /api/formulario`: Cria um novo usuário com base nos dados fornecidos.
- `PUT /api/formulario/{id}`: Atualiza as informações de um usuário existente.
- `DELETE /api/formulario/{id}`: Exclui um usuário do sistema.

## Instalação

1. Clone o repositório:

   ```bash
   git clone https://github.com/seu-usuario/nome-do-repositorio.git
   cd nome-do-repositorio
2. Instale as dependências do Laravel:
     ```bash
   composer install

3. Copie o arquivo de ambiente:

    ```bash
    cp .env.example .env

4. Configure o arquivo .env com as informações do banco de dados.

5. Execute as migrações do banco de dados:
    ```bash
   php artisan migrate

6.Inicie o servidor local:
    ```bash
    php artisan serve