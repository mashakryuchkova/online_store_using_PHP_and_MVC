function getEditById(id) {
    $.ajax({
        url: window.BASE_DIR + "/../getEditById/" + id + "/",
        dataType: "html",
        type: "POST",
        success: function (html) {
            $('div.accordion-body').append(html);
            $('#edit_modal').on('hidden.bs.modal', function (e) {
                $(e.target).remove();
            })
            $('#edit_modal').modal('show');
        }
    })
}

function edit() {
    let data = $('#form_edit').serializeArray();

    $.ajax({
        url: window.BASE_DIR + "/../lk/edit",
        data: data,
        dataType: "json",
        type: "POST",
        success: function (json) {
            if (json.error > 0) {
                $("#form_edit .error_danger").show();
            } else {
                location.reload();
            }
        }
    })
}