# Portal de Aprendizagem para Jovens Aprendizes

## Descrição

Este projeto visa desenvolver um portal de aprendizagem completo e eficiente para certificadoras da Lei da Aprendizagem, facilitando a gestão de programas de aprendizagem e a formação de jovens profissionais.

## Funcionalidades Principais

* **Gestão de Turmas:**
    * Criação e gerenciamento de turmas para formação básica e aprendizagem prática.
    * Alocação de alunos em turmas e controle de vagas.
* **Cadastro de Alunos:**
    * Cadastro completo de alunos da formação básica e aprendizes.
    * Armazenamento de informações pessoais, acadêmicas e contratuais.
* **Gestão de Contratos:**
    * Geração de contratos de aprendizagem em formato XML.
    * Controle de informações contratuais e prazos.
* **Controle Acadêmico:**
    * Registro de notas da formação básica e acompanhamento do desempenho dos alunos.
    * Registro de ocorrências e emissão de boletins.
* **Processos Seletivos:**
    * Segmentação de dados para triagens e processos seletivos.
    * Geração de relatórios e indicadores de desempenho.
* **Certificação:**
    * Geração de Certificados em XML.

## Tecnologias Utilizadas

* **Front-end:** Bootstrap, HTML, CSS, JavaScript
* **Back-end:** PHP
* **Banco de Dados:** MySQL ou PostgreSQL
* **Outras:** XML

## Banco de Dados

O banco de dados `ong_cursos` é composto pelas seguintes tabelas:

### Tabelas

* **alunos\_turma:**
    * `aluno_id` (INT, chave estrangeira para `usuarios.id`)
    * `turma_id` (INT, chave estrangeira para `turmas.id`)
* **contato:**
    * `id` (INT, chave primária)
    * `usuario_id` (INT, chave estrangeira para `usuarios.id`)
    * `celular` (VARCHAR)
    * `celular_responsavel` (VARCHAR)
    * `nome_responsavel` (VARCHAR)
    * `nome_recado` (VARCHAR)
    * `tel_recado` (VARCHAR)
* **dados\_academicos\_profissionais:**
    * `id` (INT, chave primária)
    * `usuario_id` (INT, chave estrangeira para `usuarios.id`)
    * `escolaridade` (VARCHAR)
    * `periodo_escola` (VARCHAR)
    * `curso_relacionado` (TINYINT)
    * `curso_qual` (VARCHAR)
    * `observacoes_pedagogicas` (TEXT)
    * `sugestoes_atuacao` (TEXT)
    * `empresas_encaminhadas` (TEXT)
    * `contrato_email` (VARCHAR)
* **disciplinas\_formacao\_basica:**
    * `id` (INT, chave primária)
    * `nome` (VARCHAR)
    * `professor_id` (INT, chave estrangeira para `usuarios.id`)
* **endereco:**
    * `id` (INT, chave primária)
    * `usuario_id` (INT, chave estrangeira para `usuarios.id`)
    * `cep` (VARCHAR)
    * `rua` (VARCHAR)
    * `numero` (VARCHAR)
    * `nro_res` (VARCHAR)
    * `complemento` (VARCHAR)
    * `localidade` (VARCHAR)
    * `bairro` (VARCHAR)
* **notas:**
    * `id` (INT, chave primária)
    * `aluno_id` (INT, chave estrangeira para `usuarios.id`)
    * `turma_id` (INT, chave estrangeira para `turmas.id`)
    * `professor_id` (INT, chave estrangeira para `usuarios.id`)
    * `disciplina` (VARCHAR)
    * `nota` (DECIMAL)
    * `created_at` (TIMESTAMP)
    * `disciplina_id` (INT, chave estrangeira para `disciplinas_formacao_basica.id`)
* **turmas:**
    * `id` (INT, chave primária)
    * `nome` (VARCHAR)
    * `tipo` (ENUM)
    * `coordenador_id` (INT, chave estrangeira para `usuarios.id`)
    * `created_at` (TIMESTAMP)
* **usuarios:**
    * `id` (INT, chave primária)
    * `nome` (VARCHAR)
    * `nome_social` (VARCHAR)
    * `email` (VARCHAR)
    * `senha` (VARCHAR)
    * `tipo` (ENUM)
    * `identidade_genero` (VARCHAR)
    * `sexo` (ENUM)
    * `data_nasc` (DATE)
    * `rg` (VARCHAR)
    * `cpf` (VARCHAR)
    * `status` (ENUM)
    * `created_at` (TIMESTAMP)

### Relacionamentos

* A tabela `alunos_turma` faz a ligação entre alunos e turmas, permitindo que um aluno participe de várias turmas e uma turma tenha vários alunos.
* As tabelas `contato`, `dados_academicos_profissionais` e `endereco` possuem chaves estrangeiras para `usuarios.id`, indicando que cada usuário pode ter um registro de contato, dados acadêmicos/profissionais e endereço associado.
* A tabela `notas` possui chaves estrangeiras para `usuarios.id` (aluno e professor), `turmas.id` e `disciplinas_formacao_basica.id`, indicando a nota de um aluno em uma disciplina de uma turma, atribuída por um professor.
* A tabela `turmas` possui uma chave estrangeira para `usuarios.id`, indicando o coordenador da turma.
* A tabela `disciplinas_formacao_basica` possui uma chave estrangeira para `usuarios.id`, indicando o professor responsável pela disciplina.

### Diagrama ER (Opcional)

(Insira aqui um diagrama ER representando a estrutura do banco de dados)

## Como Executar o Projeto

1.  Clone este repositório: `git clone https://github.com/seu-usuario/seu-repositorio`
2.  Instale as dependências do Composer: `composer install`
3.  Crie um banco de dados MySQL ou PostgreSQL e configure as credenciais no arquivo `.env`.
4.  Execute as migrações do banco de dados: `php artisan migrate`
5.  Inicie o servidor PHP: `php artisan serve`
6.  Abra o navegador e acesse `http://localhost:8000`.

## Contribuição

Contribuições são sempre bem-vindas! Se você tiver alguma sugestão ou encontrar algum problema, por favor, abra uma issue ou envie um pull request.

## Licença

[Adicione a licença do seu projeto, se aplicável]

## Contato

* Anderson Trajano
* [anderson.trajano@email.com](mailto:anderson.trajano@email.com)
* [Seu LinkedIn (opcional)]
