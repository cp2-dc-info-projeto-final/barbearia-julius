# **SISTEMA DE AGENDAMENTO** <h1>
## BARBEARIA JULIUS <h2>
* Ana Caroline de Oliveira
* Antônio Reuther Fructuoso Damasceno 
* Lucas de Souza Santana
* Lucas Melo Moura
* Beatriz dos Santos Silva

## NICKNAME DO GITHUB
* ANA - https://github.com/anacasroline
* ANTONIO - https://github.com/Damascenopog
* LUCAS DE SOUZA - https://github.com/LCTRAIN
* LUCAS MELO MOURA - https://github.com/lucasmelomr
* Beatriz dos Santos Silva - https://github.com/biaacgb1

## Descrição do Projeto

Bem-vindo ao projeto da Barbearia Julius, o seu destino premium para cuidados masculinos e estilo. Navegue por nosso espaço virtual e descubra um refúgio de sofisticação onde a tradição se encontra com a modernidade. Com uma equipe de barbeiros altamente qualificados, oferecemos cortes de cabelo, barbas e tratamentos de spa excepcionais, proporcionando a você uma experiência de cuidados pessoais inigualável. Explore nossos serviços, conheça nossos profissionais e agende sua visita para uma transformação que vai além da aparência, proporcionando confiança e bem-estar. Na Barbearia Julius, onde você estiver, eu vou estar lá!

## Documentação

- [Manual do Usuário](Doc/manual.md)
- [Requisitos](Doc/requisitos.md)
- [Casos de Uso](Doc/casos-de-uso.md)
- [Apresentação](Doc/apresentacao.pdf)


**Modelagem do Banco de Dados**

![Barbearia Julius](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/c5203ff2-4125-4f57-b263-ef04adf41a73)


## REQUISITOS FUNCIONAIS <h2>

### RF 01
O sistema deverá ter uma interface de cadastro para usuários.

### RF 02
O sistema deverá ter uma interface de login.

### RF 03
O sistema deverá ter uma interface de agendamento de serviços, calendário interativo, hora e funcionário.

### RF 04
O sistema deverá ter uma interface da página principal com alteração de dados e meus agendamentos.

### RF 05
O sistema deverá ter um dashboard para administradores com opção de cadastrar um funcionário, excluir um funcionário, cadastrar um serviço e excluir um serviço.

### RF 06
O sistema deverá ter um dashboard para funcionários com a opção de ver e cancelar os agendamentos feitos para ele.

### RF 07
O sistema deverá ter uma opção de logout.

## REQUISITOS NÃO FUNCIONAIS <h2>

### RNF 01
o sistema deverá se comunicar com o banco de dados MYSQL

### RNF 02
o sistema deverá ser disponibilizado em português

### RNF 03
o sistema deverá ser desenvolvido nas linguagens: html, css , PHP, javascript.

# Documento de Casos de Uso

# **SISTEMA DE AGENDAMENTO** <h1>

## CDU 01 - Cadastro de usuários <h1>

### Fluxo principal

1. O sistema apresenta formulário de cadastro
2. O usuário preenche o campo nome, email, senha e confirmação de senha.
3. O usuário pressiona o botão "enviar"
4. O sistema valida as informações
5. O sistema cadastra o usuário
6. O sistema redireciona o usuário para a página de login
![tca](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/4f6ba4af-b070-4644-a1b5-ac4681f9da07)

### Fluxo alternativo A - já existente

1. O sistema informa que já possui uma conta vinculada com esse email
2. O usuário preenche um outro email
3. O sistema valida as informações
4. O sistema cadastra o usuário
5. O sistema redireciona o usuário para a página de login
![FluxoAlt_Cad01](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/42af0953-47d9-4c40-b1c5-756fd424b93f)


## CDU 02 - Login <h1>

### Fluxo principal

1. O sistema apresenta formulário de login
2. O usuário preenche o campo email e senha
3. O usuário pressiona o botão "enviar"
4. O sistema valida email e senha
5. O sistema redireciona o usuário para a página principal
![WhatsApp Image 2023-09-15 at 18 43 51 (2)](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/ffc0ef01-47f1-4a67-bdfc-20e8ed3995f3)

### Fluxo alternativo A

1. O sistema informa que há alguma informação inválida
2. O usuário preenche novamente o email e senha
3. O usuário clica no botão "enviar"
4. O sistema redireciona o usuário para a página principal
![FluxoAlt_Log01](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/ded03f08-ee66-43ce-bba4-0561c5715e1c)


### Fluxo alternatico C - Esqueceu a senha.

1. O sistema apresenta o formulário de login
2. O usuário pressiona o botão "Esqueceu a senha?"
3. O sistema redireciona o usuário para a página de redefinição de senha
4. O usuário preenche com o email da conta que deseja
5. O sistema envia um e-mail de confirmação com um link para redefinição de senha
6. Entrando no link, o usuário preencherá com uma nova senha e confirmar a senha.
7. O sistema altera a senha no banco de dados
8. O sistema apresenta o formulário de login
9. O usuário preenche o campo email e senha
10. O usuário pressiona o botão "enviar"
11. O sistema redireciona o usuário para a página principal
![FluxoAlt_Log03](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/f960c911-05f9-4a55-b87a-478afc02a381)


## CDU 03 - Agendamento de serviço<h1>

### Fluxo principal

1. O usuário clica na opção para acessar a seleção de profissionais.
2. O usuário seleciona o funcionário com o qual  deseja agendar um horário.
4. O usuário clica no botão de buscar horários.
5. O sistema exibirá as horas disponíveis para o profissional selecionado.
6. O usuário escolhe um horário que se adeque ao seu agendamento.
7. !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
8. O sistema exibe um modal ou pop up que faz um breve resumo do que o usuário escolheu contendo (data, profissional, valor, hora e um botão para confirmar agendamento) 
9. !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
10. O usuário clica no botão "confirmar"
![FluxoPrinc_Agenda](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/e4be6018-53e3-45bf-91e9-32dd5a432629)


## CDU 04 -  Alterar senha <h1>

### Fluxo principal

1. Usuário seleciona a opção de alterar senha
2. O usuário preenche as informações necessárias
3. O sistema altera a senha
![FluxoPrinc_AlteraSenha](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/f30dcbb2-7ad8-44e3-8ad1-16d8a242e306)

## CDU 05 -  Alterar dados <h1>

1. Usuário seleciona a opção de alterar dados
2. O usuário preenche as informações que deseja alterar
3. O sistema altera as informações concedidas
![FluxoPrinc_AlteraDados](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/96ba6888-6ab0-48ac-86d8-ff099ef58828)



## CDU 05 - Cancelamento <h1>

### Fluxo principal - Cancelamento <h1>

1. O usuário acessa o sistema usando suas credenciais de login
2. O usuário é direcionado para o painel onde seus agendamentos são exibidos
3. O usuário localiza o agendamento que deseja cancelar
4. Junto ao agendamento, o cliente encontra a opção "Cancelar" e clica nela
5. Uma mensagem de confirmação é exibida: "Tem certeza de que deseja cancelar este agendamento?" 
6. O sistema remove o agendamento e envia uma notificação confirmando o cancelamento
![WhatsApp Image 2023-09-15 at 18 43 51](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/a22d8a5c-e3e2-4813-beac-01c75f35ab7b)


## CDU 06 - Dashboard para administradores <h1>

### Fluxo principal

1. O administrador acessa o Dashboard
2. O administrador seleciona um dia no calendário
3. O administrador realiza as alterações necessárias nos agendamentos 
4. O sistema realiza as alterações e envia um email ao usuário informando as alterações
![FluxoPrinc_Dashboard](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/98c4a566-5770-46c6-9615-09197495587f)


## Diagrama de Casos de uso

![WhatsApp Image 2023-09-14 at 14 22 45](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/6132e15b-fbc2-4f23-b2be-9b1ee4916187)



# CRONOGRAMA DE DESENVOLVIMENTO<h1>

* SPRINT 1: 07/08 - 18/08
ENTREGAR OS MATERIAIS DA PRIMEIRA SPRINT NO PRAZO

* SPRINT 2: 21/08 - 02/09
ENTREGAR A INTERFACE DE CADASTRO

* SPRINT 3: 04/09 - 16/09
ENTREGAR A INTERFACE DE LOGIN

* Banca:
ENTREGAR A INTERFACE DO ACESSO AO PERFIL E DA PÁGINA PRINCIPAL

 * 2º Cert.: 16/10 - 18/10
ENTREGAR A INTERFACE DE AGENDAMENTOS DE SERVIÇO E UM CALENDÁRIO INTERATIVO 

* 3ª cert: 15/12 - 22/12
REVISAR OS ERROS E APRESENTAR

* Correções da banca preliminar - 11/20/23 a 20/10/23

* SPRINT 4 - 23/10/23 a 04/11/23 (sábado letivo)
INTEGRAÇÃO DO AGENDAMENTO AO BANCO DE DADOS

* SPRINT 5 - 06/11/23 a 18/11/23 (sábado letivo)
REAGENDAMENTO, CANCELAMENTO (INTEGRADOS AO BANCO DE DADOS) E DASHBOARD PARA ADMINISTRADORES (FRONT-END)

* SPRINT 6 - 21/11/23 a 01/12/23 (sexta)
DASHBOARD PARA ADMINISTRADORES JÁ COM AS FUNCIONALIDADES, TESTES E MUDANÇAS FINAIS

* Provão 3° certificação - 06/12/23

* Banca de Apresentação - 11/12/23 a 15/12/23
