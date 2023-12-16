<?php
session_start();
// Verifica se a variável de sessão do tipo de usuário está definida como administrador
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'administrador') {
    header("Location: logout.php");
    exit; 
}
echo "";
?>



<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Administrador</title>
<link rel="stylesheet" href="../css/pop_up_fun.css">
<link rel="stylesheet" href="../css/adm.css">
</head>
<body>



<button onclick="abrirModal()">Cadastrar Funcionário</button> <!-- Botão para abrir o modal -->
<div id="myModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="fecharModal()">&times;</span>
            <h2>Adicionar Novo Funcionário</h2>
            <div id="mensagem"></div> <!-- Elemento para exibir a mensagem -->
            <form action="processa_novo_funcionario.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" pattern="[A-Za-z]{3,}\s[A-Za-z]{3,}" title="Por favor, insira um nome e sobrenome "><br><br>

              <label for="senha">Senha:</label>
              <input type="password" id="senha" name="senha" required><br><br>
              
              <label for="numero">Celular:</label>
              <input type="text" id="numero" name="numero" minlength="11" maxlength="11" pattern=".{11}" title="Por favor, insira 11 numeros" required><br><br>

              
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" required><br><br>
              
              <input type="submit" value="Adicionar Funcionário">
            </form>
        </div>
    </div>
<!-- Adicione este trecho abaixo do formulário de adição de funcionário 
<button onclick="abrirModalExclusao()">Excluir Funcionário</button>

<div id="modalExclusao" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="fecharModalExclusao()">&times;</span>
        <h2>Excluir Funcionário</h2>
        <div id="mensagemExclusao"></div>
        <form id="formExclusao">
            <label for="idFuncionario">ID do Funcionário:</label>
            <input type="text" id="idFuncionario" name="id_funcionario" required><br><br>

            <button type="button" onclick="excluirFuncionario()">Excluir Funcionário</button>
        </form>
    </div>
</div> <!-- Botão para abrir o modal -->
<button onclick="abrirModalCad()">Cadastrar Serviço</button> <!-- Botão para abrir o modal -->
<div id="modalCad" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="fecharModalCad()">&times;</span>
            <h2>Adicionar Novo Serviço</h2>
            <div id="mensagemCad"></div> <!-- Elemento para exibir a mensagem -->
            <form action="processa_novo_servico.php" method="POST">
            <label for="descricao">Descrição:</label>
              <input type="text" id="descricao" name="descricao" required><br><br>
              
              <label for="preco">Preço:</label>
              <input type="text" id="preco" name="preco" required><br><br>
              <input type="submit" value="Adicionar Serviço">
              </form>
        </div>
    </div>
    

<!-- Adicione este trecho abaixo do formulário de adição de funcionário 
<button onclick="abrirModalExclusaoS()">Excluir Serviço</button>

<div id="modalExclusaoS" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="fecharModalExclusaoS()">&times;</span>
        <h2>Excluir Funcionário</h2>
        <div id="mensagemExclusaoS"></div>
        <form id="formExclusaoS">
            <label for="idServico">ID do serviço:</label>
            <input type="text" id="idServico" name="id_servico" required><br><br>
            <button type="button" onclick="excluirServico()">Excluir Serviço</button>
            
        </form>
    </div>
</div> <!-- Botão para abrir o modal -->

<a class="nav" href="../php/logout.php">Sair</a>

<script>
function excluirServico() {
    var idServico = document.getElementById('idServico').value;

    // Enviar requisição AJAX para o script de exclusão
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'exclui_servico.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            var response = JSON.parse(xhr.responseText);
            var mensagemExclusaoS = document.getElementById('mensagemExclusaoS');
            if (response.success) {
                mensagemExclusaoS.innerHTML = response.message;
            } else {
                mensagemExclusaoS.innerHTML = 'Erro ao excluir serviço';
            }
        }
    };
    xhr.send('id_servico=' + idServico);
}
</script>

<!-- Restante do seu código permanece o mesmo -->


<script>
function excluirFuncionario() {
    var idFuncionario = document.getElementById('idFuncionario').value;

    // Enviar requisição AJAX para o script de exclusão
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'exclui_funcionario.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            var response = JSON.parse(xhr.responseText);
            var mensagemExclusao = document.getElementById('mensagemExclusao');
            if (response.success) {
                mensagemExclusao.innerHTML = response.message;
            } else {
                mensagemExclusao.innerHTML = 'Erro ao excluir funcionário';
            }
        }
    };
    xhr.send('id_funcionario=' + idFuncionario);
}
</script>

<script src="../js/pop_up_ex.js"></script>
<script src="../js/pop_up_fun.js"></script>
<script src="../js/pop_up_cad.js"></script>
<script src="../js/pop_up_ex_servico.js"></script>

<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        $mensagem = "Novo funcionário adicionado com sucesso!";
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        abrirModal(); // Exibe o pop-up para adicionar funcionário
        document.getElementById('mensagem').innerHTML = '<?php echo $mensagem; ?>';
    });
</script>
<?php
    } elseif ($_GET['success'] == 0 ) {
        $mensagem = "Funcionario com email ou numero ja existente.";
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        abrirModal(); // Exibe o pop-up para adicionar funcionário
        document.getElementById('mensagem').innerHTML = '<?php echo $mensagem; ?>';
    });
</script>
<?php
    }
}
?>



<script>

// Função para abrir o modal
function abrirModalCad() {
    document.getElementById('modalCad').style.display = 'block';
}

// Função para fechar o modal
function fecharModalCad() {
    document.getElementById('modalCad').style.display = 'none';
}

// Verificar parâmetros e exibir mensagem no modal, se necessário
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const successParam = urlParams.get('success');

    if (successParam === '8') {
        abrirModalCad();
        document.getElementById('mensagemCad').innerHTML = 'Descrição já existente.';
    } else if (successParam === '2') {
        abrirModalCad();
        document.getElementById('mensagemCad').innerHTML = 'Falha na operação.';
    } else if (successParam === '4') {
        const tipoParam = urlParams.get('tipo');
        if (tipoParam === 'servicoo') {
            abrirModalCad();
            document.getElementById('mensagemCad').innerHTML = 'Novo serviço cadastrado com sucesso!';
        }
    } 
});
</script>


</body>
</html>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/meus_agendamento.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../js/pagina_cliente1.js"></script>
    <script src="../js/pagina_cliente2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <title>Seus Dados - Barbearia Julius</title>
</head>
<body>
<section>

<?php
    include '../inc/conecta_mysqli.inc';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_service'])) {
        $service_id = $_POST['delete_service'];

        // Prepare a query to delete the service
        $delete_query = "DELETE FROM servico WHERE id_servico = ?";
        $stmt = $mysqli->prepare($delete_query);

        if ($stmt) {
            $stmt->bind_param("i", $service_id);
            $stmt->execute();

            // Check if the deletion was successful
            if ($stmt->affected_rows > 0) {
                echo "Serviço excluído com sucesso.";
            } else {
                echo "Falha ao excluir o serviço.";
            }

            $stmt->close();
        } else {
            echo "Erro na preparação da declaração SQL.";
        }
    }

    $query = "SELECT * FROM servico";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {

        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Descrição</th><th>Preço</th><th>Ação</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_servico'] . "</td>";
            echo "<td>" . $row['descricao'] . "</td>";
            echo "<td>" . $row['preco'] . "</td>";
            echo "<td>
                    <form method='post'>
                        <input type='hidden' name='delete_service' value='" . $row['id_servico'] . "'>
                        <button type='submit'>Excluir</button>
                    </form>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum serviço encontrado.";
    }

    mysqli_close($mysqli);
?>
<?php
    include '../inc/conecta_mysqli.inc';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_employee'])) {
        $employee_id = $_POST['delete_employee'];

        // Prepare a query to delete the employee
        $delete_query = "DELETE FROM funcionarios WHERE id_funcionario = ?";
        $stmt = $mysqli->prepare($delete_query);

        if ($stmt) {
            $stmt->bind_param("i", $employee_id);
            $stmt->execute();

            // Check if the deletion was successful
            if ($stmt->affected_rows > 0) {
                echo "Funcionário excluído com sucesso.";
            } else {
                echo "Falha ao excluir o funcionário.";
            }

            $stmt->close();
        } else {
            echo "Erro na preparação da declaração SQL.";
        }
    }

    $query = "SELECT * FROM funcionarios";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {

        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Ação</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_funcionario'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>
                    <form method='post'>
                        <input type='hidden' name='delete_employee' value='" . $row['id_funcionario'] . "'>
                        <button type='submit'>Excluir</button>
                    </form>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum funcionário encontrado.";
    }

    mysqli_close($mysqli);
?>


</body>
</html>
