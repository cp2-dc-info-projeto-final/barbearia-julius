$(document).ready(function() {
    // Manipulador de mudança para o funcionário
    $('#id_funcionario').on('change', function() {
        const selecionado = $(this).val().toString();
        const dataSelecionada = $('#data_agenda').val();

        const partesData = dataSelecionada.split('-');
        const dataFormatoCorreto = partesData[2] + '-' + partesData[1] + '-' + partesData[0];

        $('#horario_inicio').empty();

        if (selecionado !== '0') {
            $.ajax({
                url: 'consultar_horarios.php',
                type: 'POST',
                data: {
                    id_funcionario: selecionado,
                    data_agenda: dataFormatoCorreto,
                    funcao: 'agendar'
                },
                dataType: 'json',
                success: function(response) {
                    if (response.erros.length > 0) {
                        console.error('Erro na requisição AJAX:', response.erros);
                    } else {
                        response.horarios_disponiveis.forEach(function(horario) {
                            $('#horario_inicio').append($('<option>', {
                                value: horario,
                                text: horario
                            }));
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erro na requisição AJAX:', error);
                    console.log(xhr.responseText);
                }
            });
        }
    });


    // Manipulador de envio para o formulário de agendamento
    $("form").submit(function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        // Realiza a submissão do formulário via AJAX
        $.ajax({
            url: 'recebe_agen.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.erros.length > 0) {
                    // Exibe mensagens de erro na página
                    $("#mensagemErro").text(response.erros.join('\n')).show();
                    $("#mensagemSucesso").hide();
                } else {
                    // Exibe mensagem de sucesso na página
                    $("#mensagemSucesso").text(response.mensagem).show();
                    
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição AJAX:', error);
                console.log(xhr.responseText);
            }
        });
    });
});