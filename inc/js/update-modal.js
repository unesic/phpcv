$('.update-btn').click(function () {
    const $id = $(this).attr('data-component');

    $.ajax({
        type: 'POST',
        url: 'views/component/update.php',
        data: {
            id: $id
        },
        success: function (data) {
            const $component = JSON.parse(data);

            $('#update-modal-title').text($component['type']);
            $('#update-text').text($component['content']);
            $('#save-btn').attr('data-component', $component['id']);
            $('#update-modal').modal('show');
        },
    });

    $('#save-btn').click(function () {
        const $id = $(this).attr('data-component');
        const $content = $('#update-text').val();
        const $type = $('#update-modal-title').text();

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
            },
        });
    });
});