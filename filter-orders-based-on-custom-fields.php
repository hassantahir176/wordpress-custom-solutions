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
