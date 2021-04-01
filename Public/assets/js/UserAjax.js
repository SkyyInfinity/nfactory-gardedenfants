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
            if (allergys.indexOf(selected_allergy) < 0) {
                allergys.push(selected_allergy)
            }
            $('#selected_allergy_list').empty();
            var i = 0;
            allergys.forEach(allergy => {
                if (i == 0) {
                    $('#selected_allergy_list').append('<p>Allergies : </p><a href="#" class="span_allergy_' + allergy + '" id="remove_allergy">' + allergy + '</a>')
                    i++;
                } else {
                    $('#selected_allergy_list').append(', <a href="#" class="span_allergy_' + allergy + '" id="remove_allergy">' + allergy + '</a>')
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
    $('#remove_allergy').click(function (e) { 
        e.preventDefault();
            console.log('test')
            var allergy_id = $(this).attr;
            console.log(allergy_id);
    });
    $(document).ready(function () {
        $(document).on("click", ".MultiCheckBox", function () {
            var detail = $(this).next();
            detail.show();
        });

        $(document).on("click", ".MultiCheckBoxDetailHeader input", function (e) {
            e.stopPropagation();
            var hc = $(this).prop("checked");
            $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", hc);
            $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
        });

        $(document).on("click", ".MultiCheckBoxDetailHeader", function (e) {
            var inp = $(this).find("input");
            var chk = inp.prop("checked");
            inp.prop("checked", !chk);
            $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", !chk);
            $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
        });

        $(document).on("click", ".MultiCheckBoxDetail .cont input", function (e) {
            e.stopPropagation();
            $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();

            var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
            $(".MultiCheckBoxDetailHeader input").prop("checked", val);
        });

        $(document).on("click", ".MultiCheckBoxDetail .cont", function (e) {
            var inp = $(this).find("input");
            var chk = inp.prop("checked");
            inp.prop("checked", !chk);

            var multiCheckBoxDetail = $(this).closest(".MultiCheckBoxDetail");
            var multiCheckBoxDetailBody = $(this).closest(".MultiCheckBoxDetailBody");
            multiCheckBoxDetail.next().UpdateSelect();

            var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
            $(".MultiCheckBoxDetailHeader input").prop("checked", val);
        });

        $(document).mouseup(function (e) {
            var container = $(".MultiCheckBoxDetail");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.hide();
            }
        });
    });

    var defaultMultiCheckBoxOption = { width: '100%', defaultText: 'Select Below', height: '200px' };

    jQuery.fn.extend({
        CreateMultiCheckBox: function (options) {

            var localOption = {};
            localOption.width = (options != null && options.width != null && options.width != undefined) ? options.width : defaultMultiCheckBoxOption.width;
            localOption.defaultText = (options != null && options.defaultText != null && options.defaultText != undefined) ? options.defaultText : defaultMultiCheckBoxOption.defaultText;
            localOption.height = (options != null && options.height != null && options.height != undefined) ? options.height : defaultMultiCheckBoxOption.height;

            this.hide();
            this.attr("multiple", "multiple");
            var divSel = $("<div class='MultiCheckBox'>" + localOption.defaultText + '<span class="k-icon k-i-arrow-60-down"><i class="fas fa-chevron-down"></i></span></div>').insertBefore(this);
            divSel.css({ "width": localOption.width });

            var detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailHeader'><div>Tout selectionner</div><input type='checkbox' class='mulinput' value='-1982' /></div><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
            detail.css({ "width": '327.06px', "max-height": localOption.height });
            var multiCheckBoxDetailBody = detail.find(".MultiCheckBoxDetailBody");

            this.find("option").each(function () {
                var val = $(this).attr("value");

                if (val == undefined)
                    val = '';

                multiCheckBoxDetailBody.append("<div class='cont'><div><input type='checkbox' class='mulinput' value='" + val + "' /></div><div>" + $(this).text() + "</div></div>");
            });

            multiCheckBoxDetailBody.css("max-height", (parseInt($(".MultiCheckBoxDetail").css("max-height")) - 28) + "px");
        },
        UpdateSelect: function () {
            var arr = [];

            this.prev().find(".mulinput:checked").each(function () {
                arr.push($(this).val());
            });

            this.val(arr);
        },
    });
    $("#allergy_list").CreateMultiCheckBox({ 
        width: '80%', 
        defaultText : '--Choisissez une allergie--', 
        height:'250px' 
    });

    $("#disease").CreateMultiCheckBox({ 
        width: '80%', 
        defaultText : '--Choisissez une maladie--', 
        height:'250px' 
    });

});
