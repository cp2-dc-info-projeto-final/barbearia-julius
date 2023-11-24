# Documento de Casos de Uso

# **SISTEMA DE AGENDAMENTO** <h1>
## BARBEARIA JULIUS <h2>
* Ana Caroline de Oliveira
* Antônio Reuther Fructuoso Damasceno 
* Lucas de Souza Santana
* Lucas Melo Moura 

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

### Fluxo alternativo A

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

### Fluxo alternativo A

1. O usuário seleciona um produto e/ou um serviço disponível
2. O sistema direciona o usuário para a inteface de cadastro
3. O usuário preenche o cadastro 
4. O sistema valida o cadastro
5. O sistema redireciona o usuário para a página principal novamente
4. O produto e/ou um serviço disponível é selecionado

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



### Fluxo alternativo A

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

## CDU 05 -  Configuraçoes de conta <h1>

### Fluxo principal

1. Ao clicar na opção "perfil" da página principal o usuário é direcionado para uma interface da página do cliente.
2. Na página do cliente estarão as informações concedidas pelo usuário.
3. O sistema exibe as opções de "mudar a senha" e "sair".
4. O usuário clica na opção de "mudar a senha" 
5. O usuário é direcionado para a página de redefinição de senha.

### Fluxo alternativo A

5. O usuário clica em sair
6. O usuário é direcionado para a interface da página principal

## CDU 06 - Cancelamento <h1>

### Fluxo principal - Cancelamento <h1>

1. O usuário acessa o sistema usando suas credenciais de login
2. O usuário é direcionado para o painel onde seus agendamentos são exibidos
3. O usuário localiza o agendamento que deseja cancelar
4. Junto ao agendamento, o cliente encontra a opção "Cancelar" e clica nela
5. Uma mensagem de confirmação é exibida: "Tem certeza de que deseja cancelar este agendamento?" 
6. O sistema remove o agendamento e envia uma notificação confirmando o cancelamento
![WhatsApp Image 2023-09-15 at 18 43 51](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/a22d8a5c-e3e2-4813-beac-01c75f35ab7b)


## CDU 07 - Dashboard para administradores <h1>

### Fluxo principal

1. O administrador acessa o Dashboard
2. O administrador seleciona um dia no calendário
3. O administrador realiza as alterações necessárias nos agendamentos 
4. O sistema realiza as alterações e envia um email ao usuário informando as alterações
![FluxoPrinc_Dashboard](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/71456387/98c4a566-5770-46c6-9615-09197495587f)



## Diagrama de Casos de uso

![WhatsApp Image 2023-09-14 at 14 22 45](https://github.com/cp2-dc-info-projeto-final/barbearia-julius/assets/142441068/6132e15b-fbc2-4f23-b2be-9b1ee4916187)
