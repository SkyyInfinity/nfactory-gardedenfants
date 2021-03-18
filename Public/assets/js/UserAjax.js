$(document).ready(function () {
    //Ajout d'un enfant ()
    var allergys = [];
    // $('#form_add_disease').on('click',function(event) {
    //     event.preventDefault();

    // }),
    $('#form_add_allergy').on('click', function (event) {
        event.preventDefault();
        if ($('#allergy_list').val() != '') {
            var selected_allergy = $('#allergy_list').val();
            console.log(allergys.indexOf(selected_allergy))
            if (allergys.indexOf(selected_allergy) < 0) {
                allergys.push(selected_allergy)
            }
            $('#selected_allergy_list').empty();
            var i = 0;
            allergys.forEach(allergy => {
                if (i == 0) {
                    $('#selected_allergy_list').append('Allergies : <a href class="span_allergy_' + allergy + '" id="remove_allergy">' + allergy + '</a>')
                    i++;
                } else {
                    $('#selected_allergy_list').append(', <a href class="span_allergy_' + allergy + '" id="remove_allergy">' + allergy + '</a>')
                    i++;
                }
            });
        } else {
            console.log('error no selection')
        }
    })
    $('#form_add_childs').on('submit', function (e) {
        e.preventDefault();
        var children = [];
        $('#form_add_childs input[type=text]').each(function (index, element) {
            children.push(element.value);
        })
        // TODO Terminer l'ajax d'ajout d'enfants
        // TODO implementer l'ajax dans la connexion et l'inscription (Objectif : One page).
        // $.ajax({
        //     type: 'POST',
        //     url: 'ajax/ajax-abonne.php',
        //     data: {
        //         name: nom,
        //     },
        //     dataType: 'json',
        //     success: function(response) {
        //         console.log(response);
        //     }
        // })
    })
    $('#remove_allergy').on('click', function(e) {
        e.preventDefault();
        console.log('test')
        var allergy_id = $(this).getAttribute('id');
        console.log(allergy_id);
    })
});