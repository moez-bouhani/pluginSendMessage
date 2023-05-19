jQuery(function($) {
    // Soumission du formulaire via AJAX
    $('#stratis-test-plugin-form').submit(function(e) {
        e.preventDefault();
        $("#ajouter_article").html(
            `<span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span> Ajouter ...`);
            var formData = new FormData(this);
            formData.append("ajouter_article", true);
            var form = $(this);
        var messageDiv = $('#stratis-test-plugin-message');

        $.ajax({
            type: 'POST',
            url: stratis_test_plugin_ajax_object.ajax_url,
            data: form.serialize() + '&action=stratis_test_plugin_submit_form',
            dataType: 'json',
            success: function(response) {
                $("#ajouter_article").text("Ajouter");
                if (response.success) {
                    form.hide();
                    messageDiv.html('<div class="alert alert-success">Votre article a été créé avec succès !</div>');
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
