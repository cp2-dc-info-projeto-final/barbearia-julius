// Horários disponíveis (os mesmos para todos os funcionários)
const horariosFuncionario = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00'];

$(document).ready(function() {
    $('#id_funcionario').on('change', function() {
        const selecionado = $(this).val();
        $('#horario_inicio').empty();

        if (selecionado !== '0') { 
            $.each(horariosFuncionario, function(index, horario_inicio) {
                $('#horario_inicio').append($('<option>', {
                    value: horario_inicio,
                    text: horario_inicio
                }));
            });
        }
    });

    $("#meusAgendamentosButton").click(function() {
        // Toggle (mostrar/ocultar) o bloco "historicoAgendamentos"
        $("#historicoAgendamentos").toggle();
    });
});
