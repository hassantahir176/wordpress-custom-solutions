add_action( 'woocommerce_product_options_general_product_data', 'mht_add_vendor_part_number');
function mht_add_vendor_part_number(){
 
	echo '<div class="options_group">';
 
	woocommerce_wp_text_input( array(
		'id'      => 'mht_vendor_part_number',
		'value'   => get_post_meta( get_the_ID(), 'mht_vendor_part_number', true ),
		'label'   => 'Vendor Part#',
		'desc_tip' => true,
		'description' => 'Add the vendor part number here',
	) );
 
	echo '</div>';
 
}
