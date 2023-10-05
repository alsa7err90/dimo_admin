$(function () {
    var form_ajax_post = ".form_ajax_post";
    var form_ajax_edit = ".form_ajax_edit";
    var form_ajax_delete = ".form_ajax_delete";
    var form_ajax_get_images = ".form_ajax_get_images";

    $(form_ajax_post).on("submit", function (event) {
        event.preventDefault();
        var url = $(this).attr("action");
        var id_modal = $(this).attr("data-id_modal");
        $.ajax({
            url: url,
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            enctype: "multipart/form-data",
            success: function (response) {
                console.log(response);
                console.log(response[2]);
                if (response[0] == 'success') {
                    iziToast.success({ timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: response[1],position: "topRight" });


                    $('#main_table').fadeOut(800, function () {
                        $('#main_table').html(response[2]).fadeIn().delay(1000);
                    });
                    toggleModal(id_modal);
                }
            },
            error: function (data) {
                var errors = data.responseJSON;
                $.each(data.responseJSON.errors, function (key, value) {
                    iziToast.error({ timeout: 5000, icon: 'fa fa-chrome', title: 'key', message: value ,position: "topRight" });
                });

                console.log(errors);
            },
        })
    });
    // end 1
    // اكمال تحديث جدول البيانات عند طلب اجاكس اضافة او تعديل
    // 2

    $(form_ajax_edit).on("submit", function (event) {
        event.preventDefault();
        var url = $(this).attr("action");
        var id_modal = $(this).attr("data-id_modal");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            url: url,
            method: "PUT",
            data: $(this).serialize(),
            contentType: "application/x-www-form-urlencoded",
            enctype: "multipart/form-data",
            success: function (response) {
                console.log(response);

                if (response[0] == 'success') {
                    iziToast.success({ timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: response[1],position: "topRight"  });
                    $('#main_table').fadeOut(800, function () {
                        $('#main_table').html(response[2]).fadeIn().delay(1000);
                    });
                    toggleModal(id_modal);
                }

            },
            error: function (data) {
                var errors = data.responseJSON;
                console.log(errors);
                $.each(data.responseJSON.errors, function (key, value) {
                    iziToast.error({ timeout: 5000, icon: 'fa fa-chrome', title: 'key', message: value ,position: "topRight" });
                });
            },
        });
    });
    // end 2

    // 3

    $(form_ajax_delete).on("submit", function (event) {
        event.preventDefault();
        var url = $(this).attr("action");
        var id_modal = $(this).attr("data-id_modal");
        console.log(id_modal);
        $.ajax({
            url: url,
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            enctype: "multipart/form-data",
            success: function (response) {
                console.log(response);
                if (response[0] == 'success') {
                    iziToast.success({ timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: response[1],position: "topRight"  });
                    $('#main_table').fadeOut(800, function () {
                        $('#main_table').html(response[2]).fadeIn().delay(1000);
                    });
                    toggleModal(id_modal);
                }
                else {
                    iziToast.error({ timeout: 5000, icon: 'fa fa-chrome', title: 'Error', message: response[1] ,position: "topRight" });
                }

            },
            error: function (data) {
                var errors = data.responseJSON;
                console.log(errors)
                $.each(data.responseJSON.errors, function (key, value) {
                    iziToast.error({ timeout: 5000, icon: 'fa fa-chrome', title: 'key', message: value ,position: "topRight" });
                });
            },
        });
    });
    // end 2

});
