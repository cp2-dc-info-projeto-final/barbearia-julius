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
![FluxoAlt_Cad01](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/9a3f5cbe-29f5-4c47-b64d-fcb026946934)


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
![FluxoAlt_Log01](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/eebbdab3-892f-4f07-b15f-4986c22e5b5d)


## CDU 03 - Esqueceu a senha

### Fluxo Principal

1. O usuário acessa a opção de "Esqueceu a senha"
2.  O usuário preenche com o email da conta que deseja recuperar a senha
3. O sistema valida o email
4. O sistema envia uma nova senha para login naquela conta pelo email
![FluxoPrinc_EsqSenha](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/3d060efd-8017-4621-9edd-4165a2de28c3)

 
## CDU 04 - Agendamento de serviço<h1>

### Fluxo principal

1. O usuário acessa a página de agendamento de serviços
2. O usuário preenche as informações necessárias para agendar
3. O sistema realiza o agendamento
![FluxoPrinc_Agenda](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/e4be6018-53e3-45bf-91e9-32dd5a432629)

## CDU 05 -  Alterar senha <h1>

### Fluxo principal

1. Usuário seleciona a opção de alterar senha
2. O usuário preenche as informações necessárias
3. O sistema altera a senha
![FluxoPrinc_AlteraSenha](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/f30dcbb2-7ad8-44e3-8ad1-16d8a242e306)

## CDU 06 -  Alterar dados <h1>

### Fluxo principal

1. Usuário seleciona a opção de alterar dados
2. O usuário preenche as informações que deseja alterar
3. O sistema altera as informações concedidas
![FluxoPrinc_AlteraDados](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/96ba6888-6ab0-48ac-86d8-ff099ef58828)


## CDU 07 - Cancelamento de agendamento do cliente<h1>

### Fluxo principal <h1>

1. O usuário acessa a página Cliente e seleciona "Meus agendamentos"
2. O sistema mostra os agendamentos feitos pelo usuário
3. O usuário aperta em "Cancelar" no agendamento desejado
4. O usuário confirma o cancelamento
5. O sistema remove o agendamento
![FluxoPrinc_CancelaUser](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/cb7e18f7-c4b1-4085-a44e-830c0839d81c)



## CDU 07 - Cancelamento de agendamento do funcionário<h1>

### Fluxo principal <h1>

1. O funcionário realiza o login e entra na seção de gerenciamento de agendamentos
3. O funcionário aperta em "Cancelar" no agendamento desejado
4. O funcionário confirma o cancelamento
5. O sistema remove o agendamento
![FluxoPrinc_CancelaFunc](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/717985f5-265b-4e99-89b4-8f115152bc3d)


## CDU 08 - Cadastro de funcionário <h1>

### Fluxo principal

1. O administrador acessa o Dashboard
2. O administrador pressiona a opçao de Cadastrar funcionário
3. O administrador preenche as informações necessárias para o cadastro
4. O sistema realiza o cadastro
![Fluxo_CadFuncionario](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/a827e08a-dd4c-4498-9bfb-bb16f778b467)

### Fluxo alternativo A - Funcionário já cadastrado

1. O administrador acessa o Dashboard
2. O administrador pressiona a opçao de Cadastrar funcionário
3. O administrador preenche as informações necessárias para o cadastro
4. O sistema informa que já possui um funcionário com esse email
5. O administrador preenche com novos dados
6. O sistema realiza o cadastro
![FluxoAlt_CadFuncionario](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/5a752556-0b4d-4c64-b5d0-d4b63eeb9276)


## CDU 09 - Excluir funcionário

### Fluxo principal

1. O administrador acessa o Dashboard
2. O administrador pressiona a opçao de Excluir funcionário
3. O administrador preenche o id do funcionário que deseja excluir
4. O sistema realiza a exclusão
![FluxoPrinc_ExcluiFunc](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/b112c4a5-1a31-4ceb-bf00-bc540fb5c20d)



### Fluxo alternativo A - Funcionário inexistente

1. O administrador acessa o Dashboard
2. O administrador pressiona a opçao de Excluir funcionário
3. O administrador preenche o id do funcionário que deseja excluir
4. O sistema informa que não há um funcionário com o id informado
5. O administrador preenche novamente o id do funcionário
6. O sistema realiza a exclusão
![FluxoAlt_ExcluiFunc](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/7d156cef-7768-45ec-b300-1ab8d16d99f6)


## CDU 11 - Cadastro de serviços

### Fluxo principal

1. O administrador acessa o Dashboard
2. O administrador pressiona a opçao de Cadastrar serviço
3. O administrador preenche as informações necessárias para o cadastro
4. O sistema realiza o cadastro
![FluxoPrinc_CadastServ](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/26819ef2-33ae-426f-91dc-dec2c69c15cb)


### Fluxo alternativo A - Serviço já cadastrado

1. O administrador acessa o Dashboard
2. O administrador pressiona a opçao de Cadastrar serviço
3. O administrador preenche as informações necessárias para o cadastro
4. O sistema informa que já há um serviço com o nome informado
5. O administrador preenche com outro nome
6. O sistema realiza a o cadastro
![FluxoAlt_CadastServ](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/160019fd-7e5f-42bf-a6b5-1da4883ea2bb)


## CDU 10 Excluir serviço

### Fluxo principal

1. O administrador acessa o Dashboard
2. O administrador pressiona a opçao de Excluir serviço
3. O administrador preenche o id do serviço que deseja excluir
4. O sistema realiza a exclusão
![FluxoPrinc_ExcluiServ](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/a72d8a8e-d14a-4f48-9a66-7478c9aa3319)



### Fluxo alternativo A - Serviço inexistente

1. O administrador acessa o Dashboard
2. O administrador pressiona a opçao de Excluir serviço
3. O administrador preenche o id do serviço que deseja excluir
4. O sistema informa que não há um serviço com o id informado
5. O administrador preenche novamente o id do serviço
6. O sistema realiza a exclusão
![FluxoAlt_ExcluiServ](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/a4777e7c-4a4e-473d-afa9-fdec8c46fe08)


## Diagrama de Casos de uso

![Diagrama CDU](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/58dccb68-6849-46a8-9561-48b9a949adfd)

