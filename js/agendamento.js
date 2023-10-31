$(document).ready(function() {
    $('#funcionario').on('change', function() {
        const selecionado = $(this).val();
        
        // Limpando todos os horários
        $('#hora').empty();
        
        if (selecionado === 'julius') {
            // Horários para Julius
            const horariosJulius = ['07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00'];
            
            horariosJulius.forEach(function(horario) {
                $('#hora').append($('<option>', {
                    value: horario,
                    text: horario
                }));
            });
            
        } else if (selecionado === 'chris') {
            // Horários para Chris
            const horariosChris = ['14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00'];
            
            horariosChris.forEach(function(horario) {
                $('#hora').append($('<option>', {
                    value: horario,
                    text: horario
                }));
            });
        }
    });
});
