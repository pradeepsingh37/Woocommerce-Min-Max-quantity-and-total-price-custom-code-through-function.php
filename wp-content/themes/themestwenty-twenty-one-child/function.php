<?php 


add_action( 'woocommerce_check_cart_items', 'blogsprdp_set_min_total' );
function blogsprdp_set_min_total() {
	
	// Only run in the Cart or Checkout pages
	
	if( is_cart() || is_checkout() ) {
		global $woocommerce;

		// Set minimum cart total
		$minimum_cart_total = 250;
		
		// Set minimum cart quanity

		$minimum_num_products = 5;

		$cart_num_products = WC()->cart->cart_contents_count;

		$total = WC()->cart->subtotal;
		
		// A Minimum of 250 currency of store or A  minimum 5 quanity of items is required before checking out. 

		// any of the condition match it will redirect to the checkout page.
		

		if( ($total <= $minimum_cart_total) && ($cart_num_products < $minimum_num_products)   ) {
			
			// Display our error message
			wc_add_notice( sprintf( '<strong>Before checkout please make sure you have minimum 5 item in cart or total of cart is more than 250$</strong>',
								   $minimum_num_products,
								   $cart_num_products ),
						  'error' );
		}
	}
}