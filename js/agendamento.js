$(document).ready(function() {
    $('#id_funcionario').on('change', function() {
        const selecionado = $(this).val();
        
        // Limpando todos os horários
        $('#horario_inicio').empty();
        
        if (selecionado === 'julius') {
            // Horários para Julius
            const horariosJulius = ['07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00'];
            
            horariosJulius.forEach(function(horario_inicio) {
                $('#horario_inicio').append($('<option>', {
                    value: horario_inicio,
                    text: horario_inicio
                }));
            });
            
        } else if (selecionado === 'chris') {
            // Horários para Chris
            const horariosChris = ['14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00'];
            
            horariosChris.forEach(function(horario_inicio) {
                $('#horario_inicio').append($('<option>', {
                    value: horario_inicio,
                    text: horario_inicio
                }));
            });
        }
    });
});
