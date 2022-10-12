var commonFunction = (function () {
    let modules = {};

    modules.disableButtonWhenLoading = function (button = null) {
        console.log(99999);
        $('.btn').prop('disabled', true);
        if (button) button.addClass('btn-loading');
    }

    modules.clearMessageValidate = function () {
        $('.error-message').text('');
        $('.error-field').removeClass('error-field');
    };

    modules.showMessageValidate = function (messageList) {
        modules.clearMessageValidate();
        $.each(messageList, function (key, value) {
            if (key.includes('.')) {
                let attribute = key.split('.');
                $($('.' + attribute[0])[attribute[1]]).addClass('error-field');
                $($('.error-message[data-field=' + attribute[0] + ']')[attribute[1]]).append(value);

            } else {
                $('input[name=' + key + ']').addClass('error-field');
                $('textarea[name=' + key + ']').addClass('error-field');
                $('.error-message[data-field=' + key + ']').append(value)
            }
        });
    };

    return modules;
}(window.jQuery, window, document));
