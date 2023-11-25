$(document).ready(function() {
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

    $("#meusAgendamentosButton").click(function() {
        $("#historicoAgendamentos").toggle();
    });
});
