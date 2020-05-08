add_action( 'restrict_manage_posts', 'filter_orders_by_store', 20 );
function filter_orders_by_store() {
	global $typenow;
	if ( 'shop_order' === $typenow ) {
		// get all payment methods, even inactive ones
		//$gateways = WC()->payment_gateways->payment_gateways();
	?>
		<select name="mht_stores_filter">
			<option value="">All Stores Walk-In</option>
			<option value="nj-walk-in">New Jersey Walk-In</option>
			<option value="il-walk-in">Illinois Walk-In</option>
			<option value="nv-walk-in">Nevada Walk-In</option>
		</select>
	<?php
	}
}
add_filter( 'request', 'filter_orders_by_store_query' );
function filter_orders_by_store_query($vars){
	global $typenow;
	if ( 'shop_order' === $typenow && isset( $_GET['mht_stores_filter'] ) && ! empty( $_GET['mht_stores_filter'] ) ) {
		$vars['meta_key']   = 'mht_walk_in_store';
		$vars['meta_value'] = wc_clean( $_GET['mht_stores_filter'] );
	}
	return $vars;
}

//Following is the second example of adding custom filters

add_action( 'restrict_manage_posts', 'filter_orders_by_order_creator', 20 );
function filter_orders_by_order_creator() {
	global $typenow;
	if ( 'shop_order' === $typenow ) {
		// get all payment methods, even inactive ones
		//$gateways = WC()->payment_gateways->payment_gateways();
                
                global $wpdb;
		$order_creators= $wpdb->get_results("Select ID, user_login from wp_users where ID IN (Select DISTINCT meta_value FROM wp_postmeta WHERE meta_key=\"_wpo_order_creator\")");

	?>
		<select name="mht_order_creator_filter">
			<option value="">All Order Creators</option>
<?php                   
                        if($order_creators){
                            foreach($order_creators as $order_creator){
                        ?>
                                <option value="<?php echo $order_creator->ID; ?>"><?php echo $order_creator->user_login; ?></option>
<?php
                            }
                        }
?>
		</select>
	<?php
	}
}
add_filter( 'request', 'filter_orders_by_order_creator_query' );
function filter_orders_by_order_creator_query($vars){
	global $typenow;
	if ( 'shop_order' === $typenow && isset( $_GET['mht_order_creator_filter'] ) && ! empty( $_GET['mht_order_creator_filter'] ) ) {
		$vars['meta_key']   = '_wpo_order_creator';
		$vars['meta_value'] = wc_clean( $_GET['mht_order_creator_filter'] );
	}
	return $vars;
}
