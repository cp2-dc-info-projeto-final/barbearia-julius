$(document).ready(function() {
    $('#id_funcionario').on('change', function() {
        const selecionado = $(this).val();
        $('#horario_inicio').empty();

        if (selecionado !== '0') {
            $.ajax({
                url: 'consultar_horarios.php',
                type: 'POST',
                data: { id_funcionario: selecionado },
                dataType: 'json',
                success: function(response) {
                    $.each(response, function(index, horario) {
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
