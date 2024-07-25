$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#contact-form').on('submit', function(event) {
        event.preventDefault();
        $('.btn-save-contact').prop('disabled', true);
        $('.loading').show();
        var formData = new FormData(this);

        $.ajax({
            url: '/save-contact',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.success) {
                    $('[name="name"]').val('');
                    $('[name="phone"]').val('');
                    $('[name="email"]').val('');
                    $('[name="content"]').val('');
                    toastr.success(data.message);
                    $('.btn-save-contact').prop('disabled', false);
                    $('.loading').hide();
                } else {
                    toastr.error(data.message);
                    $('.btn-save-contact').prop('disabled', false);
                    $('.loading').hide();
                }
            },
        });
    });
});
