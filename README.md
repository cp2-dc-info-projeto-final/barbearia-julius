# **SISTEMA DE AGENDAMENTO** <h1>
## BARBEARIA JULIUS <h2>
* Ana Caroline de Oliveira
* Antônio Reuther Fructuoso Damasceno 
* Lucas de Souza Santana
* Lucas Melo Moura
* Beatriz dos Santos Silva

 ## Descrição do Projeto

Bem-vindo ao projeto da Barbearia Julius, o seu destino premium para cuidados masculinos e estilo. Navegue por nosso espaço virtual e descubra um refúgio de sofisticação onde a tradição se encontra com a modernidade. Com uma equipe de barbeiros altamente qualificados, oferecemos cortes de cabelo, barbas e tratamentos de spa excepcionais, proporcionando a você uma experiência de cuidados pessoais inigualável. Explore nossos serviços, conheça nossos profissionais e agende sua visita para uma transformação que vai além da aparência, proporcionando confiança e bem-estar. Na Barbearia Julius, onde você estiver, eu vou estar lá!

## Documentação

- [Manual do Usuário](manual.md)
- [Requisitos](requisitos.md)
- [Casos de Uso](casos-de-uso.md)
- [Apresentação](apresentacao.pdf)


**Modelagem do Banco de Dados**

![Barbearia Julius](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/c5203ff2-4125-4f57-b263-ef04adf41a73)

# **SISTEMA DE AGENDAMENTO** <h1>
## BARBEARIA JULIUS <h2>
* Ana Caroline de Oliveira
* Antônio Reuther Fructuoso Damasceno 
* Lucas de Souza Santana
* Lucas Melo Moura 

* NICKNAME DO GITHUB
* ANA - https://github.com/anacasroline
* ANTONIO - https://github.com/Damascenopog
* LUCAS DE SOUZA - https://github.com/LCTRAIN
* LUCAS MELO MOURA - https://github.com/lucasmelomr


## REQUISITOS FUNCIONAIS <h2>

### RF 01
O sistema deverá ter uma interface de cadastro para usuários.

### RF 02
O sistema deverá ter uma interface de login

### RF 03
o sistema deverá ter uma interface de agendamento de serviços e um calendário interativo

### RF 04
o sistema deverá ter uma interface da página principal

### RF 05
O sistema deverá ter uma interface de edição do perfil

### RF 06
o sistema deverá ter uma gestão de horário

### RF 07
o sistema deverá ter a opção de cancelar ou reagendar

### RF 08
o sistema deverá ter dashboard para administradores (o que terá nele)

## REQUISITOS NÃO FUNCIONAIS <h2>

### RNF 01
o sistema deverá se comunicar com o banco de dados MYSQL

### RNF 02
o sistema deverá ser disponibilizado em português

### RNF 03
o sistema deverá ser desenvolvido nas linguagens: html, css , PHP, javascript.

![WhatsApp Image 2023-09-14 at 14 22 45](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/6132e15b-fbc2-4f23-b2be-9b1ee4916187)

## CDU 01 - Cadastro de usuários <h1>

### Fluxo principal

1. O sistema apresenta formulário de cadastro
2. O usuário preenche o campo nome, email, senha e confirmação de senha.
3. O usuário pressiona o botão "enviar"
4. O sistema valida o login e senha
5. O sistema cadastra o usuário
6. O sistema redireciona o usuário para a página principal
![tca](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/4f6ba4af-b070-4644-a1b5-ac4681f9da07)

### Fluxo alternativo A - já existente

1. O sistema apresenta formulário de cadastro
2. O usuário preenche o campo nome, email, senha e confirmação de senha.
3. O usuário pressiona o botão "enviar"
3. O sistema valida o login e senha
4. O sistema informa que já possui uma conta vinculada com esse login
   ![FluxoAlt_Cad01](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/9fdc4e52-523a-4d58-88b2-97f57c2cee0a)

## CDU 02 - Login <h1>

### Fluxo principal

1. O sistema apresenta formulário de login
2. O usuário preenche o campo email e senha
3. O usuário pressiona o botão "enviar"
4. O sistema valida email e senha
5. O sistema redireciona o usuário para a página principal
![WhatsApp Image 2023-09-15 at 18 43 51 (2)](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/ffc0ef01-47f1-4a67-bdfc-20e8ed3995f3)

### Fluxo alternativo a

1. O sistema apresenta formulário de login
2. O usuário preenche o campo email e senha
3. O usuário pressiona o botão "enviar"
4. O sistema informa que o email e senha não coincidem
5. O usuário preenche novamente o email e senha
6. O usuário clica no botão "enviar"
7. O sistema redireciona o usuário para a página principal
![FluxoAlt_Log01](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/5834aaed-bc02-4f86-8802-2abbcbf2e983)

### Fluxo alternativo B

1. O sistema apresenta formulário de login
2. O usuário preenche o campo email e senha
3. O usuário pressiona o botão "enviar"
4. O sistema informa que não há uma conta vinculada à esse login
![FluxoAlt_Log02](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/0bfaa6b2-c5ad-4c28-b13f-d457cf9c8a44)

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

## CDU 03 - Interface da página principal <h1>

### Fluxo principal

1. O usuário terá acesso a página principal
2. O usuário poderá vizualizar os serviços e produtos disponíveis

### Fluxo alternativo a

1. O usuário seleciona um produto e/ou um serviço disponível
2. O sistema direciona o usuário para a inteface de cadastro
3. O usuário preenche o cadastro 
4. O sistema valida o cadastro
5. O sistema redireciona o usuário para a página principal novamente
4. O produto e/ou um serviço disponível é selecionado

## CDU 04 - Agendamento de serviço<h1>

### Fluxo principal - Agendamento de serviço.

1. O usuário clica em uma coluna escrito "serviços"
2. O sistema exibirá os serviços disponíveis
3. O usuário clicará no serviço que desejar
4. O agendamento fica registrado na coluna: Meus agendamentos
![FluxoAlt_LogSoc01](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/b7bc27d4-cde9-4835-a7ff-3d348fbb17af)

## CDU 05 - Gestão de horários <h1>

### Fluxo principal

1. O usuário clica na opção para acessar a seleção de profissionais.
2. O usuário verá uma lista de funcionários disponíveis.
3. O usuário seleciona o funcionário com o qual  deseja agendar um horário.
4. O usuário clica no botão de buscar horários.
5. O sistema exibirá as horas disponíveis para o profissional selecionado.
6. O usuário escolhe um horário que se adeque ao seu agendamento.
7. O sistema exibe um modal ou pop up que faz um breve resumo do que o usuário escolheu contendo (data, profissional, valor, hora e um botão para confirmar agendamento)
8. O usuário clica no botão "confirmar"

### Fluxo alternativo a

1. O usuário clica na opção para acessar a seleção de profissionais.
2. O sistema lista os profissionais disponíveis.
3. O usuário seleciona o profissional com o qual  deseja agendar um horário.
4. O usuário clica no botão de buscar horários.
5. O sistema notifica que não há horários disponíveis.
6. O usuário troca a data.
7. O usuário clica novamente no botão de buscar horários.
8. O sistema exibirá as horas disponíveis para o profissional selecionado.
9. O usuário escolhe um horário que se adeque ao seu agendamento.
10. O sistema exibe um modal ou pop up que faz um breve resumo do que o usuário escolheu contendo (data, profissional, valor, hora  e um botão para confirmar agendamento)
11. O usuário clica no botão "confirmar".
![FluxoAlt_GestHor01](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/7ee3d6a2-0727-4bed-8c27-38300cce1294)

## CDU 06 -  Acesso ao perfil criado <h1>

### Fluxo principal

1. Ao clicar na opção "perfil" da página principal o usuário é direcionado para uma interface da página do cliente.
2. Na página do cliente estarão as informações concedidas pelo usuário.
3. O sistema exibe as opções de "mudar a senha" e "sair".
4. O usuário clica na opção de "mudar a senha" 
5. O usuário é direcionado para a página de redefinição de senha.

### fluxo alternativo a

5. O usuário clica em sair
6. O usuário é direcionado para a interface da página principal

## CDU 07 - Cancelamento e Reagendamento <h1>

### Fluxo principal - Cancelamento <h1>

1. O usuário acessa o sistema usando suas credenciais de login
2. O usuário é direcionado para o painel onde seus agendamentos são exibidos
3. O usuário localiza o agendamento que deseja cancelar
4. Junto ao agendamento, o cliente encontra a opção "Cancelar" e clica nela
5. Uma mensagem de confirmação é exibida: "Tem certeza de que deseja cancelar este agendamento?" 
6. O sistema remove o agendamento e envia uma notificação confirmando o cancelamento
![WhatsApp Image 2023-09-15 at 18 43 51](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/a22d8a5c-e3e2-4813-beac-01c75f35ab7b)

### Fluxo principal - Reagendamento <h1>

1. O usuário acessa o sistema usando suas credenciais de login
2. O usuário é direcionado para o painel onde seus agendamentos são exibidos
3. O usuário localiza o agendamento que deseja reagendar
4. Junto ao agendamento, o cliente encontra a opção "Reagendar" e clica nela
5. O sistema exibe um calendário ou lista de horários disponíveis para o reagendamento
6. O usuário seleciona a nova data/horário e confirma a alteração
7. O sistema atualiza o agendamento e envia uma notificação com os detalhes do novo horário

## CDU 08 - Dashboard para administradores <h1>

### Fluxo principal

1. O usuário acessa a página de login
2. O usuário pressiona o botão "Enviar"
3. O sistema valida o login e senha e verifica que há permissão de administrador
4. O sistema direciona o usuário para o dashboard para administradores
![WhatsApp Image 2023-09-15 at 18 43 51 (1)](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/cd6586ae-cae9-41a6-9f65-e5f5d0293dcf)
![WhatsApp Image 2023-09-15 at 18 43 52](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/701d15a2-880a-49a2-a8aa-34ab10899da5)

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

Correções da banca preliminar - 11/20/23 a 20/10/23

* SPRINT 4 - 23/10/23 a 04/11/23 (sábado letivo)
INTEGRAÇÃO DO AGENDAMENTO AO BANCO DE DADOS

* SPRINT 5 - 06/11/23 a 18/11/23 (sábado letivo)
REAGENDAMENTO, CANCELAMENTO (INTEGRADOS AO BANCO DE DADOS) E DASHBOARD PARA ADMINISTRADORES (FRONT-END)

* SPRINT 6 - 21/11/23 a 01/12/23 (sexta)
DASHBOARD PARA ADMINISTRADORES JÁ COM AS FUNCIONALIDADES, TESTES E MUDANÇAS FINAIS

Provão 3° certificação - 06/12/23

Banca de Apresentação - 11/12/23 a 15/12/23
