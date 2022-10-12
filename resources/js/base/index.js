var common = (function () {
    let modules = {};

    modules.submitModalConfirm = function () {
        let form = $('#form-modal-confirm')[0];
        let redirectUrl = $('#form-modal-confirm input[name=redirect_url]').val();
        let formData = new FormData(form);
        let submitAjax = $.ajax({
            url: $(form).prop('action'),
            type: $(form).prop('method'),
            data: formData,
            processData: false,
            contentType: false
        })
        submitAjax.done(function (response) {
            window.location.href = redirectUrl;
        });
        submitAjax.fail(function (response) {
            let messageList = response.responseJSON.errors;
            base.showMessageValidate(messageList);
            button.prop('disabled', false).removeClass('btn-loading');
        });
    }
    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    $('#btn-common-submit-search').on('click', function () {
        $('#common-form-search').submit();
        base.disableButton($(this));
    });

    $('#btn-common-clear-search').on('click', function () {
        window.location.href = $('#common-form-search').prop('action');
        base.disableButton($(this));
    });

    $('#btn-submit-modal-confirm').on('click', function () {
        common.submitModalConfirm();
        base.disableButton($(this));
    });
});
