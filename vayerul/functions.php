<?php
/*
* register menu
*/
function register_my_menu() {
    register_nav_menu( 'header_menu', 'Header Menu' );
    register_nav_menu( 'footer-menu', 'Footer Menu' );
}
add_action( 'init', 'register_my_menu' );

add_theme_support( 'post-thumbnails' );


/*
 * add except in pages
 */

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}


/**
 * Register a custom post type called "Articles".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_lawyer_init() {
    $labels = array(
        'name'                  => _x( 'Articles', 'Post type general name', 'auto' ),
        'singular_name'         => _x( 'Articles', 'Post type singular name', 'auto' ),
        'menu_name'             => _x( 'Articles', 'Admin Menu text', 'auto' ),
        'name_admin_bar'        => _x( 'Articles', 'Add New on Toolbar', 'auto' ),
        'add_new'               => __( 'Add New', 'auto' ),
        'add_new_item'          => __( 'Add new Articles', 'auto' ),
        'new_item'              => __( 'New Articles', 'auto' ),
        'edit_item'             => __( 'Edit Articles', 'auto' ),
        'view_item'             => __( 'View Articles', 'auto' ),
        'all_items'             => __( 'All Articles', 'auto' ),
        'search_items'          => __( 'Search Articles', 'auto' ),
        'parent_item_colon'     => __( 'Parent Articles:', 'auto' ),
        'not_found'             => __( 'No Articles found.', 'auto' ),
        'not_found_in_trash'    => __( 'No Articles found in Trash.', 'auto' ),
        'featured_image'        => _x( 'Articles Cover Image', 'Overrides the “Featured Image” phrase for this post type.', 'auto' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type.', 'auto' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. ', 'auto' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. ', 'auto' ),
        'archives'              => _x( 'Articles archives', 'The post type archive label used in nav menus. Default “Post Archives”. ', 'auto' ),
        'insert_into_item'      => _x( 'Insert into Articles', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). ', 'auto' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this lawyers', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post).', 'auto' ),
        'filter_items_list'     => _x( 'Filter lawyers list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”.', 'auto' ),
        'items_list_navigation' => _x( 'Articles list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. ', 'auto' ),
        'items_list'            => _x( 'Articles list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”.', 'auto' ),
    );

    $args1 = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'articles' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-playlist-video',
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author','custom-fields', 'thumbnail', 'excerpt', 'comments' ),
    );

    register_post_type( 'articles', $args1 );
}

add_action( 'init', 'wpdocs_codex_lawyer_init' );


function add_taxonomy_thumb_meta_field() { ?>
    <div class="form-field">
        <img id="categoryImgPreview" height="80" src="<?php bloginfo("template_url"); ?>/images/1.jpg" />
        <label for="term_meta[thumb]">Category thumbnail URL</label>
        <input type="text" name="term_meta[thumb]" id="categoryImgURL" value="">
        <button id="categoryImgUpload">Upload</button>
        <p class="description">Upload an image for category thumbnail</p>
    </div>
    <?php
}
add_action( 'category_add_form_fields', 'add_taxonomy_thumb_meta_field', 10, 2 );

function edit_taxonomy_thumb_meta_field($term){
    $t_id = $term->term_id;
    $term_meta = get_option( "taxonomy_$t_id" ); ?>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="term_meta[thumb]">Category thumbnail</label>
        </th>
        <td>
            <?php if($term_meta['thumb']){
                $ImgPreviewSRC = esc_attr( $term_meta['thumb'] );


            } else {
                $ImgPreviewSRC = get_bloginfo("template_url")."/images/1.jpg";
            } ?>
            <img id="categoryImgPreview" height="80" src="<?php echo $ImgPreviewSRC; ?>" />
            <input type="text" name="term_meta[thumb]" id="categoryImgURL" value="<?php echo esc_attr( $term_meta['thumb'] ) ? esc_attr( $term_meta['thumb'] ) : ''; ?>">
            <button id="categoryImgUpload">Upload</button>
            <p class="description">Upload or Update the category thumbnail</p>
        </td>
    </tr>
    <?php
}
add_action( 'category_edit_form_fields', 'edit_taxonomy_thumb_meta_field', 10, 2 );

function save_taxonomy_thumb_meta_field( $term_id ){
    if ( isset( $_POST['term_meta'] )){

        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_$t_id" );
        $cat_keys = array_keys( $_POST['term_meta'] );
        foreach ( $cat_keys as $key ) {
            if ( isset ( $_POST['term_meta'][$key] )){
                $term_meta[$key] = $_POST['term_meta'][$key];

            }
        }
        // Save the option array.
        update_option( "taxonomy_$t_id", $term_meta );

    }
}
add_action( 'edited_category', 'save_taxonomy_thumb_meta_field', 10, 2 );
add_action( 'create_category', 'save_taxonomy_thumb_meta_field', 10, 2 );

function wpdocs_enqueue_custom_admin_script() {
    wp_enqueue_script( 'custom_script', get_template_directory_uri() . '/js/main.js', false, '1.0.0' );
    if(function_exists( 'wp_enqueue_media' )){
        wp_enqueue_media();

    }
}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_script' );

?>