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
       $labels_services = array(
           'name'               => 'Usługi',
           'singular_name'      => 'Usługa',
           'menu_name'          => 'Usługi',
           'name_admin_bar'     => 'Usługi',
           'add_new'            => 'Nowa usługa',
           'add_new_item'       => 'Dodaj nową usługę',
           'new_item'           => 'Nowa usługa',
           'edit_item'          => 'Edytuj usługę',
           'view_item'          => 'Zobacz usługę',
           'all_items'          => 'Wszystkie usługi',
           'search_items'       => 'Wyszukaj usługi',
           'parent_item_colon'  => 'Nadrzędna usługa:',
           'not_found'          => 'Nie znaleziono usługi',
           'not_found_in_trash' => 'Nie znaleziono usługi w koszu'
       );

       $args = array(
           'labels'             => $labels_services,
           'public'             => true,
           'publicly_queryable' => true,
           'show_ui'            => true,
           'show_in_menu'       => true,
           'query_var'          => true,
           'capability_type'    => 'post',
           'has_archive'        => true,
           'hierarchical'       => false,
           'menu_position'      => null,
           'supports'           => array('title', 'editor'),
           'menu_icon'          => 'dashicons-awards'
       );

       register_post_type( 'unikat_services', $args );
    }
?>
