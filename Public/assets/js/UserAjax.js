$(document).ready(function () {
    // Gestion Formulaire
    $('#registration_form').on('submit', function (e) {
        e.preventDefault();
        let prenom = $('#name').val()
        let prenom = $('#name').val()
        let email = $('#email').val()
        let age = $('#age').val()
        $.ajax({
            type: 'POST',
            url: 'ajax/ajax-abonne.php',
            data: {
                name: nom,
                prenom: prenom,
                email: email,
                age: age
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if (response['success'] == true) {
                    $('#formabonne').fadeOut('slow',function() {
                        $('#formabonne').empty();
                        $('#formabonne').append('Succes !');
                        $('#formabonne').fadeIn('slow');
                    });
                } else if (response['success'] == false) {
                    $('#error_nom,#error_prenom,#error_email,#error_age').empty();
                    $('#error_nom').html(response['errors']['nom']);
                    $('#error_prenom').html(response['errors']['prenom']);
                    $('#error_email').html(response['errors']['email']);
                    $('#error_age').html(response['errors']['age']);
                }
            }
        })
    })
});