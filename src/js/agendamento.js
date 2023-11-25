$(document).ready(function() {
    $('#id_funcionario').on('change', function() {
        const selecionado = $(this).val().toString();
        const dataSelecionada = $('#data_agenda').val(); // Obtém a data selecionada no formato dd-mm-aaaa

        // Converte a data para o formato aaaa-mm-dd
        const partesData = dataSelecionada.split('-');
        const dataFormatoCorreto = partesData[2] + '-' + partesData[1] + '-' + partesData[0];

        $('#horario_inicio').empty();

        if (selecionado !== '0') {
            $.ajax({
                url: 'consultar_horarios.php',
                type: 'POST',
                data: {
                    id_funcionario: selecionado,
                    data_agenda: dataFormatoCorreto // Envia a data no formato aaaa-mm-dd para o servidor
                },
                dataType: 'json',
                success: function(response) {
                    // Limpa os horários disponíveis e adiciona os novos horários
                    response.forEach(function(horario) {
                        $('#horario_inicio').append($('<option>', {
                            value: horario,
                            text: horario
                        }));
                    });
                },
                error: function(error) {
                    console.error('Erro na requisição AJAX: ', error);
                }
            });
        }
    });

    $("#meusAgendamentosButton").click(function() {
        $("#historicoAgendamentos").toggle();
    });
});
