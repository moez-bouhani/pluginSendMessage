jQuery(function($) {
    // Soumission du formulaire via AJAX
    $('#stratis-test-plugin-form').submit(function(e) {
        e.preventDefault();

        var form = $(this);
        var messageDiv = $('#stratis-test-plugin-message');

        $.ajax({
            type: 'POST',
            url: stratis_test_plugin_ajax_object.ajax_url,
            data: form.serialize() + '&action=stratis_test_plugin_submit_form',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    form.hide();
                    messageDiv.html('<div class="alert alert-success">Le message a été créé avec succès !</div>');
                } else {
                    messageDiv.html('<div class="alert alert-danger">' + response.data + '</div>');
                }
            },
            error: function() {
                messageDiv.html('<div class="alert alert-danger">Une erreur s\'est produite. Veuillez réessayer.</div>');
            }
        });
    });
});
