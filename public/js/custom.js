
$(function () {

    const base_url = $('#base_url').val();
    
    //Select 2 Innitialization
    // $('.select').select2();
    //datepicker
    //$('.datepicker').datepicker();

    //on person hinting, autocomplete
    $(".person").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: base_url + "people/" + request.term,
                method: 'GET',
                success: function (data) {
                    response($.map(data, function (value, key) {
                        return {
                            label: value.first_name,
                            data: value.id
                        }
                    }));
                },
                error: function (error) {
                }
            });
        },
        select: function (event, ui) {
            var value_field = $(this).attr('ref_field');
            $(`.${value_field}`).val(ui.item.data);
        }
    });

    //on village hinting, autocomplete
    $(".village").autocomplete({

        source: function (request, response) {
            console.log("here");
            $.ajax({
                url: base_url + "village/" + request.term,
                method: 'GET',
                success: function (data) {
                    response($.map(data, function (value, key) {
                        return {
                            label: `${value.village}, ${value.parish}`,
                            data: value.id
                        }
                    }));
                },
                error: function (error) {

                }
            });
        },
        select: function (event, ui) {
            var value_field = $(this).attr('ref_field');
            $(`.${value_field}`).val(ui.item.data);
            onVillageSelected(ui.item.data);
        }
    });

    //on village selection
    function onVillageSelected(village_id) {
        $.ajax({
            url: base_url + "location/" + village_id,
            method: 'GET',
            success: function (data) {
                $('#parish').val(data.parish);
                $('#district').val(data.district);
                $('#county').val(data.county);
                $('#subcounty').val(data.subcounty);
            },
            error: function (error) {
            }
        });
    }

});