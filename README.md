# Documentação da Aplicação de Rastreamento de Entregas

## Descrição

Esta aplicação tem como objetivo o rastreamento de entregas feitas por transportadoras, permitindo aos usuários buscar e visualizar informações sobre remetentes, destinatários, e detalhes do transporte, como volumes e status de entrega.

## Tecnologias Utilizadas

- **Backend:** Laravel 8
- **Frontend:** Blade, Tailwind CSS
- **Banco de Dados:** MySQL
- **Autenticação:** Laravel Auth
- **Filtragem de Dados:** Filtros dinâmicos baseados em parâmetros enviados via POST

## Funcionalidades

### 1. **Tela Inicial (Entregas)**
   - Exibe uma lista de transportadoras com e suas entregas vinculadas.
   - Permite filtrar entregas baseadas em:
     - Transportadora
     - Remetente
     - Destinatário
     - CPF do Destinatário
   - A busca pode ser feita por parâmetros específicos ou por todos os filtros simultaneamente.

### 2. **Detalhamento de Entrega**
   - Exibe detalhes de uma entrega específica, incluindo:
     - Informações sobre o remetente e destinatário.
     - Dados de rastreamento, como data e status de entrega.
     - Possibilidade de voltar à tela inicial.

### 3. **Rastreamento**
   - Permite que os usuários visualizem o status em tempo real das entregas realizadas, como "Em Trânsito" e "Entrega Criada".

## Rotas

### Rota: **`/entregas`**
- Método: `POST` e `GET`
- Descrição: Tela inicial que exibe a lista de transportadoras e possibilita aplicar filtros de pesquisa.
- Filtros disponíveis:
  - `transportadora_id`: Filtra pelas transportadoras.
  - `remetente`: Filtra pelo nome do remetente.
  - `destinatario`: Filtra pelo nome do destinatário.
  - `cpf_destinatario`: Filtra pelo CPF do destinatário.

### Rota: **`/entregas/{entrega}`**
- Método: `GET`
- Descrição: Exibe os detalhes de uma entrega específica, incluindo o status do rastreamento e os dados do remetente e destinatário.

### Rota de Filtragem:
- A filtragem ocorre diretamente na tela inicial, onde os parâmetros podem ser passados na URL ou via método `POST`.

## Estrutura de Dados

### Entidade: **Entrega**
- **id**: Identificador único da entrega.
- **id_transportadora**: Identificador da Transportadora vinculado a entrega.
- **remetente**: Dados do remetente, armazenados como um objeto JSON.
- **destinatario**: Dados do destinatário, armazenados como um objeto JSON.
- **rastreamento**: Dados de rastreamento da entrega, armazenados como um objeto JSON.
- **volumes**: Número de volumes na entrega.

### Entidade: **Transportadora**
- **id**: Identificador único da transportadora.
- **fantasia**: Nome fantasia da transportadora.
- **cnpj**: CNPJ da transportadora.

## Filtros e Escopos

O sistema permite a utilização de filtros para a busca de entregas. Todos os filtros estão disponíveis para uso através de formulários de pesquisa:

- **Transportadora**: Filtro para selecionar a transportadora da entrega.
- **Remetente**: Filtro que permite buscar pelo nome do remetente.
- **Destinatário**: Filtro para buscar pelo nome do destinatário.
- **CPF do Destinatário**: Filtro que permite buscar pelo CPF do destinatário.
- **Data de Início e Data de Fim**: Filtros para buscar entregas com base em um intervalo de tempo.

## Conclusão

Esta aplicação tem como objetivo fornecer uma solução completa de rastreamento de entregas. Com a utilização de filtros dinâmicos, o usuário pode facilmente acessar e visualizar as informações relevantes de suas entregas. A interface de usuário foi construída com Blade e Tailwind CSS, garantindo um design limpo e funcional.

## Como Rodar a Aplicação Localmente

### Pré-requisitos

- PHP 7.4.x ou superior
- Composer
- MySQL

### Passos para execução

1. Clone o repositório:
   ```bash
   git clone https://github.com/Pierryyy/teste-tecnico.git

2. Navegue até o diretório do projeto:

    ```bash
       cd teste-tecnico
3. Instale as dependências do projeto com o Composer:
   ```bash
   composer install
4. Configure as credenciais do banco de dados no arquivo .env, ajustando as variáveis DB_DATABASE, DB_USERNAME e DB_PASSWORD para o seu ambiente.
    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=rastreia_ai
    DB_USERNAME=root
    DB_PASSWORD=admin
   
6. Gere a chave de aplicação do Laravel:
   ```bash
       php artisan key:generate
7. Execute as migrações para criar as tabelas no banco de dados:
    ```bash
        php artisan migrate
8. Inicie o servidor de desenvolvimento:
    ```bash
        php artisan serve

A aplicação estará disponível em http://127.0.0.1:8000.


