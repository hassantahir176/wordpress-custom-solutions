// add a link to the WP Admin Toolbar
function custom_toolbar_link($wp_admin_bar) {
    $args = array(
        'id' => 'mht_top_bar_users_link',
        'title' => 'Users', 
        'href' => 'https://www.magicwandcompany.com/wp-admin/users.php', 
        'meta' => array(
            'class' => 'wpbeginner', 
            'title' => 'View All Users'
            )
    );
    $wp_admin_bar->add_node($args);

    // Add the first child link 
     
    $args = array(
        'id' => 'mht_all_users',
        'title' => 'All Users', 
        'href' => 'https://www.magicwandcompany.com/wp-admin/users.php',
        'parent' => 'mht_top_bar_users_link', 
        'meta' => array(
            'class' => 'mht_all_users', 
            'title' => 'View All Users'
            )
    );
    $wp_admin_bar->add_node($args);
 
	// Add another child link
	$args = array(
        'id' => 'mht_add_new_user',
        'title' => 'Add New', 
        'href' => 'https://www.magicwandcompany.com/wp-admin/user-new.php',
        'parent' => 'mht_top_bar_users_link', 
        'meta' => array(
            'class' => 'mht_add_new_user', 
            'title' => 'Add New User'
            )
    );
    $wp_admin_bar->add_node($args);

	$args = array(
        'id' => 'mht_your_profile',
        'title' => 'Your Profile', 
        'href' => 'https://www.magicwandcompany.com/wp-admin/profile.php',
        'parent' => 'mht_top_bar_users_link', 
        'meta' => array(
            'class' => 'mht_your_profile', 
            'title' => 'Your Profile'
            )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'custom_toolbar_link', 999);
