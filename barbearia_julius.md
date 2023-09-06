# **SiSTEMA DE AGENDAMENTO** <h1>
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

### rf 01
O sistema deverá ter uma interface de cadastro para usuários.

### rf 02
O sistema deverá ter uma interface de login

### rf 03
o sistema deverá ter uma interface de agendamento de serviços e um calendário interativo

### rf 04
o sistema deverá ter uma interface da página principal

### rf 05
O sistema deverá ter uma interface de edição do perfil

### rf 06
o sistema deverá ter uma gestão de horários 

### rf 07
o sistema deverá ter a opção de cancelar ou reagendar

### rf 08
o sistema deverá ter a opção de avaliar e comentar

### rf 09
o sistema deverá ter dashboard para administradores (o que terá nele)

## REQUISITOS não FUNCIONAIS <h2>

### rnf 01
o sistema deverá se comunicar com o banco de dados MYSQL

### rnf 02
o sistema deverá ser disponibilizado em português

### rnf 03
o sistema deverá ser desenvolvido nas linguagens: html, css e javascript

# cdu 01 - cadastro de usuários <h1>

### Fluxo principal

1. O sistema apresenta formulário de cadastro
2. O usuário preenche o campo nome, número de celular,  login, senha, confirmação de senha.
3. O usuário pressiona o botão "Cadastrar"
4. O sistema valida o login e senha
5. O sistema cadastra o usuário
6. O sistema redireciona o usuário para a página principal

### Fluxo alternativo A - já existente

1. O sistema apresenta formulário de cadastro
2. O usuário preenche o campo nome, número de celular,  login, senha, confirmação de senha.
3. O usuário pressiona o botão "Cadastrar"
3. O sistema valida o login e senha
4. O sistema informa que já possui uma conta vinculada com esse login

# CDU 1.5 - Login/Cadastro Social

### Fluxo Principal - Entrar com SSO

1. O sistema apresenta o formulário de login
2. O usuário pressiona alguma opção de SSO
3. O sistema redireciona o usuário para a opção de cadastro por meio do SSO
3. O usuário faz o processo fora do site
4. O sistema valida o login
5. O sistema redireciona o usuário para a página principal

### Fluxo alternativo A - Cadastro

1. O sistema apresenta o formulário de login
2. O usuário pressiona alguma opção de SSO
3. O sistema redireciona o usuário para a opção de cadastro por meio do SSO
3. O usuário faz o processo fora do site
4. O sistema valida o login e não reconhece o login
5. O sistema direciona o usuário para completar o cadastro utilizando as informações, onde algumas já estão preenchidas.
6. O usuário pressiona o botão "Cadastrar"
7. O sistema redireciona o usuário para a página principal

# CDU 02 - Login <h1>

### Fluxo principal

1. O sistema apresenta formulário de login
2. O usuário preenche o campo usuário e senha
3. O usuário pressiona o botão "Logar"
4. O sistema valida login e senha
5. O sistema redireciona o usuário para a página principal

### Fluxo alternativo a

1. O sistema apresenta formulário de login
2. O usuário preenche o campo usuário e senha
3. O usuário pressiona o botão "Logar"
4. O sistema informa que o login e senha não coincidem
5. O usuário preenche novamente o login e senha
6. O usuário clica no botão "Logar"
7. O sistema redireciona o usuário para a página principal

### Fluxo alternativo B

1. O sistema apresenta formulário de login
2. O usuário preenche o campo usuário e senha
3. O usuário pressiona o botão "Logar"
4. O sistema informa que não há uma conta vinculada à esse login

### Fluxo alternativo C

1. O sistema apresenta o formulário de login
2. O usuário pressiona o botão "Esqueceu a senha?"
3. O sistema redireciona o usuário para a página de redefinição de senha
4. O usuário preenche com o login da conta que deseja
5. O sistema envia um e-mail de confirmação com um link para redefinição de senha
6. Entrando no link, o usuário preencherá com uma nova senha e confirmar a senha.
7. O sistema altera a senha no banco de dados
8. O usuário redireciona o usuário para a página principal

# cdu 03 -  Calendario Interativo<h1>

### Fluxo principal - calendário interativo.

1. O usuário clica na opção "Calendário" para acessar o calendário interativo.
2. Um pop-up ou modal será exibido, permitindo que o usuário selecione o mês e o dia desejados.
3. O usuário clica no número do dia e do mês no calendário.

# cdu 04- Agendamento de serviço<h1>

### fluxo principal - agendamento de serviço.

1. o usuário clica em uma coluna escrito "serviços".
2. o sistema exibirá os serviços disponíveis.
3. o usuário clicará no serviço que desejar.

# cdu 05 - gestão de horários <h1>

### Fluxo principal

1. O usuário clica na opção para acessar a seleção de profissionais.
2. O usuário verá uma lista de funcionários disponíveis.
3. O usuário seleciona o funcionário com o qual  deseja agendar um horário.
4. O usuário clica no botão de buscar horários.
5. O sistema exibirá as horas disponíveis para o profissional selecionado.
6. O usuário escolhe um horário que se adeque ao seu agendamento.
7. O sistema exibe um modal ou pop up que faz um breve resumo do que o usuário escolheu contendo (data, profissional,valor, hora , uma coluna para o usuário colocar alguma observação e um botão para confirmar agendamento)
8. O usuário clica no botão "confirmar"

### fluxo alternativo a

1. O usuário clica na opção para acessar a seleção de profissionais.
2. O sistema lista os profissionais disponíveis.
3. O usuário seleciona o profissional com o qual  deseja agendar um horário.
4. O usuário clica no botão de buscar horários.
5. O sistema notifica que não há horários disponíveis.
6. O usuário troca a data.
7. O usuário clica novamente no botão de buscar horários.
8. O sistema exibirá as horas disponíveis para o profissional selecionado.
9. O usuário escolhe um horário que se adeque ao seu agendamento.
10. O sistema exibe um modal ou pop up que faz um breve resumo do que o usuário escolheu contendo (data, profissional,valor, hora , uma coluna para o usuário colocar alguma observação e um botão para confirmar agendamento
11. O usuário clica no botão "confirmar".

# cdu 06 -  acesso ao perfil criado <h1>

### Fluxo principal

1. Ao clicar na opção "perfil" da página principal o usuário é redirecionado para uma interface da página do cliente.
2. Na página do cliente estarão as informações concedidas pelo usuário.
3. No canto inferior esquerdo estarão as opções de "mudar a senha" e "sair".
4. Ao clicar na opção de "mudar a senha" você é redirecionado para a página de redefinição de senha.
5. Ao clicar em sair, você é redirecionado para a interface de login do sistema.

### fluxo alternativo a

1.  Além das opções "mudar a senha" e "sair", o acesso ao perfil também terá a opção "Histórico de agendamento".
2. Ao clicar na opção "histórico de agendamento" os serviços agendados, datas e horários, serão impressos na tela para que os clientes possam acompanhar suas visitas anteriores.
3. Para sair da exibição, o usuário só precisa voltar.

# cdu 07 - cancelamento e reagendamento <h1>

### Fluxo principal -Cancelamento

1. O cliente acessa o sistema usando suas credenciais de login. 
2. O cliente é direcionado para o painel onde seus agendamentos são exibidos. 
3. O cliente localiza o agendamento que deseja cancelar. 
4. Junto ao agendamento, o cliente encontra a opção "Cancelar" e clica nela. 
5. Uma mensagem de confirmação é exibida: "Tem certeza de que deseja cancelar este agendamento?". 
6. Se houver uma taxa de cancelamento, o sistema informa o cliente sobre a taxa e pede confirmação. 
7. O sistema remove o agendamento e envia uma notificação confirmando o cancelamento.

### fluxo principal -reagendamento

1. O cliente acessa o sistema usando suas credenciais de login. 
2. O cliente é direcionado para o painel onde seus agendamentos são exibidos. 
3. O cliente localiza o agendamento que deseja reagendar. 
4. Junto ao agendamento, o cliente encontra a opção "Reagendar" e clica nela. 
5. O sistema exibe um calendário ou lista de horários disponíveis para o reagendamento. 
6. O cliente seleciona a nova data/horário e confirma a alteração. 
7. O sistema atualiza o agendamento e envia uma notificação com os detalhes do novo horário.

# cdu 08 - avaliações e comentários <h1>

### Fluxo principal

1. O cliente acessa o sistema usando suas credenciais de login.
2. O cliente é direcionado para o painel onde seus agendamentos passados são exibidos.
3. O cliente localiza o agendamento que deseja avaliar.
4. Junto ao agendamento concluído, o cliente encontra a opção "Avaliar" e clica nela.
5. O sistema exibe uma escala de 1 a 5 estrelas, permitindo que o cliente escolha sua avaliação.
6. O cliente confirma sua seleção e a avaliação é registrada no sistema.

### Fluxo principal Comentários

1. O cliente acessa o sistema usando suas credenciais de login.
2. O cliente é direcionado para o painel onde seus agendamentos passados são exibidos.
3. O cliente localiza o agendamento sobre o qual deseja comentar.
4. Junto ao agendamento concluído, o cliente encontra a opção "Comentar" e clica nela.
5. O sistema exibe um campo de texto onde o cliente pode escrever seu comentário.
6. O cliente confirma a submissão do seu comentário, e ele é registrado no sistema.

### fluxo alternativo a

1. Dependendo da política da barbearia, os comentários podem passar por uma moderação antes de serem publicados.

# cdu 09 - dashboard para administradores <h1>

### Fluxo principal

1. O usuário acessa a página de login
2. O usuário pressiona o botão "Logar"
3. O sistema valida o login e senha e verifica que há permissão de administrador
4. O sistema redireciona o usuário para o dashboard para administradores

# CRONOGRAMA DE DESENVOLVIMENTO<h1>

* SPRINT 1: 07/08 - 18/08
ENTREGAR OS MATERIAIS DA PRIMEIRA SPRINT NO PRAZO

* SPRINT 2: 21/08 - 02/09
ENTREGAR A INTERFACE DE CADASTRO

* SPRINT 3: 04/09 - 16/09
ENTREGAR A INTERFACE DE LOGIN 

* banca: 16/10 - 18/10
ENTREGAR A INTERFACE DE AGENDAMENTOS DE SERVIÇO E UM CALENDÁRIO INTERATIVO 

* 2ª cert: 02/10 - 14/10
ENTREGAR A INTERFACE DO ACESSO AO PERFIL 

* SPRINT 4: 23/10 - 04/11
ENTREGAR A GESTÃO DE HORÁRIOS 

* SPRINT 5: 06/11 - 18/11
ENTREGAR A INTERFACE PARA O CANCELAMENTO OU REAGENDAMENTO 

* SPRINT 6: 27/11 - 02/12
ENTREGAR A INTERFACE PARA A OPÇÃO DE AVALIAR E COMENTAR 

* revisão: 04/12 - 08/12
ENTREGAR A INTERFACE DA DASHBOARD PARA ADMINISTRADORES 

* banca f: 11/12 - 14/12
CONECTAR COM O BANCO DE DADOS MYSQL

* 3ª cert: 15/12 - 22/12
REVISAR OS ERROS E APRESENTAR 




