<?php
/*
Plugin Name: pluginMouezBouhani
Description: Plugin pour STRATIS - Test - WordPress - Développeur PHP
Version: 1.0
*/

// Enregistrement du shortcode
function stratis_test_plugin_shortcode() {
    ob_start();
    stratis_test_plugin_display_form();
    return ob_get_clean();
}
add_shortcode('stratis_test_plugin', 'stratis_test_plugin_shortcode');

// Affichage du formulaire
function stratis_test_plugin_display_form() {
    ?>
     <div id="stratis-test-plugin-message" class="stratis-test-plugin-message mt-3"></div>
    <form id="stratis-test-plugin-form" class="stratis-test-plugin-form">
        <div class="mb-3">
  <label for="titre" class="form-label">Titre <span class="required">*</span></label>
  <input type="text" class="form-control" name="titre"  id="titre" placeholder="Ajouter votre titre" required>
</div>
<div class="mb-3">
  <label for="texte" class="form-label">Texte <span class="required">*</span></label>
  <textarea class="form-control" name="texte" id="texte" placeholder="Ajouter votre texte"  rows="3" required></textarea>
</div>
        <button id="ajouter_article" name="ajouter_article"  type="submit" class="btn btn-success">Ajouter</button>
    </form>
    <script>
    var stratis_test_plugin_ajax_object = {
        ajax_url: '<?php echo admin_url('admin-ajax.php'); ?>'
    };
    </script>
    <?php
}

// Validation et création du message lors de la soumission du formulaire
add_action('wp_ajax_stratis_test_plugin_submit_form', 'stratis_test_plugin_submit_form');
add_action('wp_ajax_nopriv_stratis_test_plugin_submit_form', 'stratis_test_plugin_submit_form');
function stratis_test_plugin_submit_form() {
    if (isset($_POST['titre']) && isset($_POST['texte'])) {
        $titre = sanitize_text_field($_POST['titre']);
        $texte = sanitize_text_field($_POST['texte']);

        // Vérifier si un article avec le même titre existe déjà
        $existing_post = get_page_by_title($titre, OBJECT, 'post');
        if ($existing_post) {
            wp_send_json_error('OOPS! un article avec le même titre existe déjà.');
        }

        // Créer un nouvel article 
        $post_id = wp_insert_post(array(
            'post_title' => $titre,
            'post_content' => $texte,
            'post_status' => 'draft',
            'post_type' => 'post'
        ));

        if ($post_id) {
            // Envoyer l'e-mail à l'administrateur
            $admin_email = get_option('admin_email');
            $subject = 'Nouveau message créé : ' . $titre;
            $message = 'Titre : ' . $titre . "\r\n" . 'Texte : ' . $texte;
            wp_mail($admin_email, $subject, $message);

            wp_send_json_success();
        } else {
            wp_send_json_error('Une erreur s\'est produite lors de la création du message.');
        }
    } else {
        wp_send_json_error('Veuillez remplir tous les champs du formulaire.');
    }
}
// Enqueue les scripts et les styles
function stratis_test_plugin_enqueue_scripts() {
    // Bootstrap CSS
    wp_enqueue_style('stratis-test-plugin-bootstrap', plugin_dir_url(__FILE__) . 'assets/css/bootstrap.min.css');
    // style.css
    wp_enqueue_style('stratis-test-plugin-style', plugin_dir_url(__FILE__) . 'style.css');
    // Bootstrap JS
    wp_enqueue_script('stratis-test-plugin-bootstrap', plugin_dir_url(__FILE__) . 'assets/js/bootstrap.min.js', array('jquery'));
    // ajax.js
    wp_enqueue_script('stratis-test-plugin-ajax', plugin_dir_url(__FILE__) . 'ajax.js', array('jquery'));
    wp_localize_script('stratis-test-plugin-ajax', 'stratis_test_plugin_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'stratis_test_plugin_enqueue_scripts');

