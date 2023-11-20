$(document).ready(function(){
    $('#meusAgendamentosButton').on('click', function(){
        $.ajax({
            url: 'meus_agendamentos.php',
            method: 'GET',
            success: function(response){
                $('#historicoAgendamentos').html(response);
                $('#historicoAgendamentos').toggle(); // Mostra ou esconde os agendamentos
            }
        });
    });
});
