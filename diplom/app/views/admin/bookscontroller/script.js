$(document).ready(function () {
    $('#form_new_book').submit(function (event) {
        event.preventDefault();

        let fdata = new FormData(this);

        $.ajax({
            url: window.BASE_DIR + "/books/add/",
            data: fdata,
            processData: false,
            contentType: false,
            dataType: "json",
            type: "POST",
            success: function (json) {
                if (json.error > 0) {
                    $(".error_danger").show();
                } else {
                    location.reload();
                }
            }
        })
    })
    $("#search").on('input', function (event) {
        let q = $(event.target);
        $.ajax({
            url: window.BASE_DIR + "/books/search/",
            data: {"q": q.val()},
            dataType: "html",
            type: "get",
            success: function (html) {
                $("#table_container").html(html);

            }
        })
    })
})

function bookDelete(id, name) {
    if (confirm(`Вы уверены, что хотите удалить категорию ${name} с id = ${id}?`)) {
        $.ajax({
            url: window.BASE_DIR + "/books/del/",
            data: {id: id},
            dataType: "json",
            type: "POST",
            success: function (json) {
                if (json.error > 0) {
                    alert("Error");
                } else {
                    location.reload();
                }
            }
        })
    }
}

function getEditFormById(id) {
    $.ajax({
        url: window.BASE_DIR + `/books/getEditFormById/${id}/`,
        dataType: "html",
        type: "POST",
        success: function (html) {
            $('div.main').append(html);
            $('#edit_book_modal').on('hidden.bs.modal', function (e) {
                $(e.target).remove();
            })
            $('#edit_book_modal').modal('show');
        }
    })
}

function bookEdit() {
    let form = $('#form_edit_book')[0];
    let data = new FormData(form);
    $.ajax({url: window.BASE_DIR + "/books/edit/",
        data: data, dataType: "json",
        type: "POST", processData: false, // Не обрабатывать данные
        contentType: false, // Не устанавливать тип контента
        success: function (json) {
            if (json.error > 0) {
                $("#form_edit_book .error_danger").show();
            } else {
                location.reload();
            }
        }
    });
}
