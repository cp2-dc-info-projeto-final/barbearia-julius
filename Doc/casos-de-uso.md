# Documento de Casos de Uso

# **SISTEMA DE AGENDAMENTO** <h1>
## BARBEARIA JULIUS <h2>
* Ana Caroline de Oliveira
* Antônio Reuther Fructuoso Damasceno 
* Lucas de Souza Santana
* Lucas Melo Moura
* Beatriz dos Santos Silva

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


## CDU 02 - Login 

### Fluxo principal

1. O sistema apresenta formulário de login
2. O usuário preenche o campo email e senha
3. O usuário pressiona o botão "enviar"
4. O sistema valida email e senha
5. O sistema redireciona o usuário para a página principal
![WhatsApp Image 2023-09-15 at 18 43 51 (2)](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/ffc0ef01-47f1-4a67-bdfc-20e8ed3995f3)

### Fluxo alternativo A - Informação inválida

1. O sistema informa que há alguma informação inválida
2. O usuário preenche novamente o email e senha
3. O usuário clica no botão "enviar"
4. O sistema redireciona o usuário para a página principal
![FluxoAlt_Log01](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/ded03f08-ee66-43ce-bba4-0561c5715e1c)

## CDU 03 - Esqueceu a senha

### Fluxo Principal

1. O usuário acessa a opção de "Esqueceu a senha"
2.  O usuário preenche com o email da conta que deseja recuperar a senha
3. O sistema valida o email
4. O sistema envia uma nova senha para login naquela conta

![FluxoAlt_Log03](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/f960c911-05f9-4a55-b87a-478afc02a381)

 
## CDU 04 - Agendamento de serviço<h1>

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


## CDU 05 -  Alterar senha <h1>

### Fluxo principal

1. Usuário seleciona a opção de alterar senha
2. O usuário preenche as informações necessárias
3. O sistema altera a senha
![FluxoPrinc_AlteraSenha](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/f30dcbb2-7ad8-44e3-8ad1-16d8a242e306)

## CDU 06 -  Alterar dados <h1>

1. Usuário seleciona a opção de alterar dados
2. O usuário preenche as informações que deseja alterar
3. O sistema altera as informações concedidas
![FluxoPrinc_AlteraDados](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/96ba6888-6ab0-48ac-86d8-ff099ef58828)



## CDU 07 - Cancelamento <h1>

### Fluxo principal - Cancelamento <h1>

1. O usuário acessa o sistema usando suas credenciais de login
2. O usuário é direcionado para o painel onde seus agendamentos são exibidos
3. O usuário localiza o agendamento que deseja cancelar
4. Junto ao agendamento, o cliente encontra a opção "Cancelar" e clica nela
5. Uma mensagem de confirmação é exibida: "Tem certeza de que deseja cancelar este agendamento?" 
6. O sistema remove o agendamento e envia uma notificação confirmando o cancelamento
![WhatsApp Image 2023-09-15 at 18 43 51](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/a22d8a5c-e3e2-4813-beac-01c75f35ab7b)


## CDU 08 - Cadastro de funcionário <h1>

### Fluxo principal

1. O administrador acessa o Dashboard
2. O administrador pressiona a opçao de Cadastrar funcionário
3. O administrador preenche as informações necessárias para o cadastro
4. O sistema realiza o cadastro
![Fluxo_CadFuncionario](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/a827e08a-dd4c-4498-9bfb-bb16f778b467)

### Fluxo alternativo - Funcionário já cadastrado

1. O administrador acessa o Dashboard
2. O administrador pressiona a opçao de Cadastrar funcionário
3. O administrador preenche as informações necessárias para o cadastro
4. O sistema informa que já possui um funcionário com esse email
5. O administrador preenche com novos dados
6. O sistema realiza o cadastro
![FluxoAlt_CadFuncionario](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/581f58f7-d83f-435f-baef-7b3651d8c7cf)


## CDU 09 - Cadastro de serviços

### Fluxo principal

1. O administrador acessa o Dashboard
2. O administrador pressiona a opçao de Cadastrar serviço
3. O administrador preenche as informações necessárias para o cadastro
4. O sistema realiza o cadastro


## Diagrama de Casos de uso

![Diagrama CDU](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/58dccb68-6849-46a8-9561-48b9a949adfd)

