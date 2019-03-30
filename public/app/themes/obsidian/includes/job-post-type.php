<?php

namespace Obsidian\Job_Post_Type;

/**
 * Registers the Custom Post Type
 *
 * Must be called in WordPress init hook
 *
 * @see GenerateWP for a generator https://generatewp.com/post-type/
 *
 * @return void
 */
function register_post_type()
{
    $labels = array(
    'name'                  => _x('Jobs', 'Post Type General Name', 'obsidian'),
    'singular_name'         => _x('Job', 'Post Type Singular Name', 'obsidian'),
    'menu_name'             => __('Jobs', 'obsidian'),
    'name_admin_bar'        => __('Job', 'obsidian'),
    'archives'              => __('Job Archiv', 'obsidian'),
    'attributes'            => __('Job Attribute', 'obsidian'),
    'parent_item_colon'     => __('Parent Item:', 'obsidian'),
    'all_items'             => __('Alle Jobs', 'obsidian'),
    'add_new_item'          => __('Neuen Job hinzufügen', 'obsidian'),
    'add_new'               => __('Neuen hinzufügen', 'obsidian'),
    'new_item'              => __('Neuer Job', 'obsidian'),
    'edit_item'             => __('Job bearbeiten', 'obsidian'),
    'update_item'           => __('Job aktualisieren', 'obsidian'),
    'view_item'             => __('Job ansehen', 'obsidian'),
    'view_items'            => __('Jobs ansehen', 'obsidian'),
    'search_items'          => __('Job suchen', 'obsidian'),
    'not_found'             => __('Job nicht gefunden', 'obsidian'),
    'not_found_in_trash'    => __('Not found in Trash', 'obsidian'),
    'featured_image'        => __('Featured Image', 'obsidian'),
    'set_featured_image'    => __('Featured Image hinzufügen', 'obsidian'),
    'remove_featured_image' => __('Featured Image entfernen', 'obsidian'),
    'use_featured_image'    => __('Als Featured Image verwenden', 'obsidian'),
    'insert_into_item'      => __('Einfügen', 'obsidian'),
    'uploaded_to_this_item' => __('Zu Job hochladen', 'obsidian'),
    'items_list'            => __('Job Liste', 'obsidian'),
    'items_list_navigation' => __('Job Liste Navigation', 'obsidian'),
    'filter_items_list'     => __('Job Liste filtern', 'obsidian'),
    );
    $capabilities = array(
    'edit_post'          => 'edit_job',
    'read_post'          => 'read_job',
    'delete_post'        => 'delete_job',
    'edit_posts'         => 'edit_jobs',
    'edit_others_posts'  => 'edit_others_jobs',
    'publish_posts'      => 'publish_jobs',
    'read_private_posts' => 'read_private_jobs',
    );
    $args = array(
    'label'               => __('Job', 'obsidian'),
    'labels'              => $labels,
    'supports'            => array( 'title', 'thumbnail', 'editor' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-id',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capabilities'        => $capabilities,
    'show_in_rest'        => true,
    'map_meta_cap'        => false,
    'taxonomies'          => [ 'job_branch' ],
    );
    \register_post_type('job', $args);
}

/**
 * Registers the Custom Taxonomy
 *
 * Must be called in WordPress init hook
 *
 * @see GenerateWP for a generator https://generatewp.com/taxonomy/
 *
 * @return void
 */
function register_taxonomy()
{

    $labels = array(
    'name'                       => _x('Job Branches', 'Taxonomy General Name', 'obsidian'),
    'singular_name'              => _x('Job Branch', 'Taxonomy Singular Name', 'obsidian'),
    'menu_name'                  => __('Taxonomy', 'obsidian'),
    'all_items'                  => __('All Items', 'obsidian'),
    'parent_item'                => __('Parent Item', 'obsidian'),
    'parent_item_colon'          => __('Parent Item:', 'obsidian'),
    'new_item_name'              => __('New Item Name', 'obsidian'),
    'add_new_item'               => __('Add New Item', 'obsidian'),
    'edit_item'                  => __('Edit Item', 'obsidian'),
    'update_item'                => __('Update Item', 'obsidian'),
    'view_item'                  => __('View Item', 'obsidian'),
    'separate_items_with_commas' => __('Separate items with commas', 'obsidian'),
    'add_or_remove_items'        => __('Add or remove items', 'obsidian'),
    'choose_from_most_used'      => __('Choose from the most used', 'obsidian'),
    'popular_items'              => __('Popular Items', 'obsidian'),
    'search_items'               => __('Search Items', 'obsidian'),
    'not_found'                  => __('Not Found', 'obsidian'),
    'no_terms'                   => __('No items', 'obsidian'),
    'items_list'                 => __('Items list', 'obsidian'),
    'items_list_navigation'      => __('Items list navigation', 'obsidian'),
    );
    $args = array(
    'labels'            => $labels,
    'hierarchical'      => false,
    'public'            => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud'     => true,
    );
    \register_taxonomy('job_branch', array( 'job' ), $args);
}
