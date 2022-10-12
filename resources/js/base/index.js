let BUTTON_SUBMIT_FORM_SEARCH_SELECTOR = '#btn-submit-base-form-search';
let BASE_FORM_SEARCH_SELECTOR = '#base-form-search';
let BUTTON_SUBMIT_FORM_DATA_SELECTOR = '#btn-submit-base-form-data';
let BASE_FORM_DATA_SELECTOR = '#base-form-data';

var baseFunction = (function () {
    let modules = {};
    // Submit form search
    modules.submitBaseFormSearch = function () {
        $(BASE_FORM_SEARCH_SELECTOR).submit();
    }
    // Submit form data
    modules.submitBaseFormData = function () {
        let form = $(BASE_FORM_DATA_SELECTOR)[0];
        let redirectUrl = $(BASE_FORM_DATA_SELECTOR + ' input[name=redirect_url]').val();
        let formData = new FormData(form);
        let submitAjax = $.ajax({
            url: $(form).prop('action'),
            type: $(form).prop('method'),
            data: formData,
            processData: false,
            contentType: false
        })
        submitAjax.done(function (response) {
            if (redirectUrl) {
                window.location.href = redirectUrl;
            } else {
                window.location.reload();
            }
        });
        submitAjax.fail(function (response) {
            let messageList = response.responseJSON.errors;
            commonFunction.showMessageValidate(messageList);
            $(BUTTON_SUBMIT_FORM_DATA_SELECTOR).prop('disabled', false).removeClass('btn-loading');
        });
    }

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    // Resolve click submit form search
    $(BUTTON_SUBMIT_FORM_SEARCH_SELECTOR).on('click', function () {
        baseFunction.submitBaseFormSearch();
        commonFunction.disableButtonWhenLoading($(this));
    });
    // Resolve click submit form data
    $(BUTTON_SUBMIT_FORM_DATA_SELECTOR).on('click', function () {
        baseFunction.submitBaseFormData();
        commonFunction.disableButtonWhenLoading($(this));
    });
    // Remove class-error and message-error when focus field
    $(document).on('focus', '.error-field', function () {
        $(this).removeClass('error-field');
        $('.error-message[data-field=' + $(this).prop('name') + ']').text('');
    });
});
