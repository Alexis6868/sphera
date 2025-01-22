<?php

//Style
function mon_agence_enqueue_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css'));

    if (is_page_template('page-services.php')) {
        wp_enqueue_style('services-style', get_template_directory_uri() . '/assets/css/page-services.css', array(), filemtime(get_template_directory() . '/assets/css/page-services.css'));
    } elseif (is_page_template('page-about.php')) {
        wp_enqueue_style('about-style', get_template_directory_uri() . '/assets/css/page-about.css', array(), filemtime(get_template_directory() . '/assets/css/page-about.css'));
    } elseif (is_page_template('page-contact.php')) {
        wp_enqueue_style('contact-style', get_template_directory_uri() . '/assets/css/page-contact.css', array(), filemtime(get_template_directory() . '/assets/css/page-contact.css'));
    } elseif (is_page_template('page-projet.php')) {
        wp_enqueue_style('projet-style', get_template_directory_uri() . '/assets/css/page-projet.css', array(), filemtime(get_template_directory() . '/assets/css/page-projet.css'));
    } elseif (is_front_page()) {
        wp_enqueue_style('home-style', get_template_directory_uri() . '/assets/css/home.css', array(), filemtime(get_template_directory() . '/assets/css/home.css'));
    }
}
add_action('wp_enqueue_scripts', 'mon_agence_enqueue_styles');

function mon_agence_enqueue_scripts() {
    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        null,
        true
    );
    wp_script_add_data('main-js', 'type', 'module');

    // Envoi de l'URL du modèle GLTF à JavaScript
    wp_localize_script('main-js', 'themeData', array(
        'gltf_model_url' => get_template_directory_uri() . '/assets/models/sphere/scene.gltf'
    ));
}
add_action('wp_enqueue_scripts', 'mon_agence_enqueue_scripts');

// Formulaire de contact
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_contact_form'])) {

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);
    

    $commentdata = array(
        'comment_post_ID'      => 0, 
        'comment_author'       => $name,
        'comment_author_email' => $email,
        'comment_content'      => $message,
        'comment_type'         => '', 
        'comment_parent'       => 0,
        'user_id'              => 0, 
        'comment_approved'     => 0, 
    );
    
    // Insert the comment
    $comment_id = wp_insert_comment($commentdata);

    if ($comment_id) {
        echo '<p>Thank you for your message. We will get back to you soon!</p>';
    } else {
        echo '<p>Sorry, there was an error. Please try again later.</p>';
    }
}

// Font Gotham
function sphera_enqueue_gotham_fonts() {
    $font_url = get_template_directory_uri() . '/assets/font/';
    
    $custom_fonts_css = "
        /* Gotham Thin */
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-Thin.woff2') format('woff2'),
                 url('{$font_url}Gotham-Thin.woff') format('woff');
            font-weight: 100;
            font-style: normal;
        }
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-ThinItalic.woff2') format('woff2'),
                 url('{$font_url}Gotham-ThinItalic.woff') format('woff');
            font-weight: 100;
            font-style: italic;
        }

        /* Gotham Extra Light */
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-XLight.woff2') format('woff2'),
                 url('{$font_url}Gotham-XLight.woff') format('woff');
            font-weight: 200;
            font-style: normal;
        }

        /* Gotham Light */
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-Light.woff2') format('woff2'),
                 url('{$font_url}Gotham-Light.woff') format('woff');
            font-weight: 300;
            font-style: normal;
        }
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-LightItalic.woff2') format('woff2'),
                 url('{$font_url}Gotham-LightItalic.woff') format('woff');
            font-weight: 300;
            font-style: italic;
        }

        /* Gotham Regular (Book) */
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-Book.woff2') format('woff2'),
                 url('{$font_url}Gotham-Book.woff') format('woff');
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-BookItalic.woff2') format('woff2'),
                 url('{$font_url}Gotham-BookItalic.woff') format('woff');
            font-weight: 400;
            font-style: italic;
        }

        /* Gotham Medium */
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-Medium.woff2') format('woff2'),
                 url('{$font_url}Gotham-Medium.woff') format('woff');
            font-weight: 500;
            font-style: normal;
        }
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-MediumItalic.woff2') format('woff2'),
                 url('{$font_url}Gotham-MediumItalic.woff') format('woff');
            font-weight: 500;
            font-style: italic;
        }

        /* Gotham Bold */
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-Bold.woff2') format('woff2'),
                 url('{$font_url}Gotham-Bold.woff') format('woff');
            font-weight: 700;
            font-style: normal;
        }
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-BoldItalic.woff2') format('woff2'),
                 url('{$font_url}Gotham-BoldItalic.woff') format('woff');
            font-weight: 700;
            font-style: italic;
        }

        /* Gotham Black */
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-Black.woff2') format('woff2'),
                 url('{$font_url}Gotham-Black.woff') format('woff');
            font-weight: 900;
            font-style: normal;
        }
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-BlackItalic.woff2') format('woff2'),
                 url('{$font_url}Gotham-BlackItalic.woff') format('woff');
            font-weight: 900;
            font-style: italic;
        }

        /* Gotham Ultra */
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-Ultra.woff2') format('woff2'),
                 url('{$font_url}Gotham-Ultra.woff') format('woff');
            font-weight: 800;
            font-style: normal;
        }
        @font-face {
            font-family: 'Gotham';
            src: url('{$font_url}Gotham-UltraItalic.woff2') format('woff2'),
                 url('{$font_url}Gotham-UltraItalic.woff') format('woff');
            font-weight: 800;
            font-style: italic;
        }
    ";

    wp_add_inline_style('main-style', $custom_fonts_css);
}
add_action('wp_enqueue_scripts', 'sphera_enqueue_gotham_fonts');


?>