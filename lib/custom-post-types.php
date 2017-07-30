<?php
    add_action( 'init', 'unikat_post_types_init' );

    function unikat_post_types_init() {
        /**
         * Register a achievement post type.
         */
        $labels_employee = array(
            'name'               => 'Pracownicy',
            'singular_name'      => 'Pracownik',
            'menu_name'          => 'Pracownicy',
            'name_admin_bar'     => 'Pracownicy',
            'add_new'            => 'Nowy Pracownik',
            'add_new_item'       => 'Dodaj nowego pracownika',
            'new_item'           => 'Nowy pracownik',
            'edit_item'          => 'Edytuj pracownika',
            'view_item'          => 'Zobacz pracownika',
            'all_items'          => 'Wszyscy pracownicy',
            'search_items'       => 'Wyszukaj pracownika',
            'parent_item_colon'  => 'Nadrzędny pracownik:',
            'not_found'          => 'Nie znaleziono pracownika',
            'not_found_in_trash' => 'Nie znaleziono pracownika w koszu'
        );

        $args = array(
            'labels'             => $labels_employee,
            'public'             => false,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title', 'editor', 'thumbnail'),
            'menu_icon'          => 'dashicons-businessman'
        );
        register_post_type( 'unikat_employee', $args );


        /**
         * Register a gallery post type.
         */
//        $labels_gallery = array(
//            'name'               => 'Galeria',
//            'singular_name'      => 'Galeria',
//            'menu_name'          => 'Galeria',
//            'name_admin_bar'     => 'Galeria',
//            'add_new'            => 'Nowy album',
//            'add_new_item'       => 'Dodaj nowy album',
//            'new_item'           => 'Nowy album',
//            'edit_item'          => 'Edytuj album',
//            'view_item'          => 'Zobacz album',
//            'all_items'          => 'Wszystkie albumy',
//            'search_items'       => 'Wyszukaj albumy',
//            'parent_item_colon'  => 'Nadrzędne albumy:',
//            'not_found'          => 'Nie znaleziono albumu',
//            'not_found_in_trash' => 'Nie znaleziono albumu w koszu'
//        );
//
//        $args = array(
//            'labels'             => $labels_gallery,
//            'public'             => true,
//            'publicly_queryable' => true,
//            'show_ui'            => true,
//            'show_in_menu'       => true,
//            'query_var'          => true,
//            'rewrite'            => array( 'slug' => 'gallery' ),
//            'capability_type'    => 'post',
//            'has_archive'        => true,
//            'hierarchical'       => false,
//            'menu_position'      => null,
//            'supports'           => array('title'),
//            'menu_icon'          => 'dashicons-format-gallery'
//        );
//
//        register_post_type( 'ak_gallery', $args );
    }
?>
