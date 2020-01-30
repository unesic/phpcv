$('.update-btn').click(function () {
    var $id = $(this).attr('data-component');

    $.ajax({
        type: 'POST',
        url: 'views/component/update.php',
        data: {
            id: $id
        },
        success: function (data) {
            var $component = JSON.parse(data);

            $('#update-modal-title').text($component['type']);
            $('#update-text').val($component['content']);
            $('#save-btn').attr('data-component', $component['id']);
            $('#update-modal').modal('show');
        },
    });

    $('#save-btn').click(function () {
        var $id = $(this).attr('data-component');
        var $content = $('#update-text').val();
        var $type = $('#update-modal-title').text();

        $.ajax({
            type: 'POST',
            url: 'views/component/update.php',
            data: {
                id: $id,
                content: $content,
                type: $type
            },
            success: function (data) {
                $('.' + data + '-component_' + $id).text($content);
                $('#update-modal').modal('hide');

                $('#update-modal-title').text('');
                $('#update-text').text('');
            },
        });
    });
});