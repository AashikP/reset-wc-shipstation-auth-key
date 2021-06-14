<?php
/**
 * Plugin Name: Reset WC Shipstation Authentication Key
 * Description: Removes the active authentication key so that WooCommerce Shipstation integration extension can generate a new key. You then have to manually update the new authentication key on your selling channel.
 * Version: 1.0.0
 * Author: AashikP
 * Author URI: https://aashikp.com
 * Text Domain: reset-wc-shipstation-auth-key
 * Requires at least: 4.9.14
 * Requires PHP: 7.3.5
 * WC requires at least: 4.0.0
 * WC tested up to: 5.4.1
 *
 * @package Reset WC Shipstation Authentication Key
 */

defined( 'ABSPATH' ) || exit;


/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce-shipstation-integration/woocommerce-shipstation.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	add_filter( 'woocommerce_debug_tools', 'add_another_tool' );

	/**
	 * Adds a new tool under WooCommerce > Tools.
	 *
	 * @param array $tools - Array of existing tools.
	 * @return array $tools - Returns updated array of tools including a tool to Reset ShipStation Authentication Keys.
	 */
	function add_another_tool( array $tools ) {

		$tools['reset_shipstation_auth'] = array(
			'name'     => __( 'Reset ShipStation Authentication Key', 'reset-wc-shipstation-auth-key' ),
			'button'   => __( 'Delete Existing Key', 'reset-wc-shipstation-auth-key' ),
			'desc'     => __( 'This removes the existing WooCommerce ShipStation Integration Authentication key so that Shipstation integration extension can generate a new key', 'reset-wc-shipstation-auth-key' ),
			'callback' => __( 'delete_existing_key', 'reset-wc-shipstation-auth-key' ),
		);

		return $tools;
	}

	/**
	 * Adds a new tool under WooCommerce > Tools.
	 *
	 * @return string $message - Returns a message confirming if the tool ran successfully.
	 */
	function delete_existing_key() {
		$get_auth_key = get_option( 'woocommerce_shipstation_auth_key' );
		if ( ! $get_auth_key ) {
			$message = __( "There isn't any shipstation authentication key to delete. Perhaps try re-installing the ShipStation Integration Extension?", 'reset-wc-shipstation-auth-key' );
		} else {
			delete_option( 'woocommerce_shipstation_auth_key' );
			/* translators: %s Existing shipstation key. */
			$message = sprintf( esc_html__( 'Deleting ShipStation Authentication key: %s. Reloading the page will result in deleting the key again. Please find new Authentication keys under Settings > Integration > ShipStation, and update your selling channel to match the latest Authentication key', 'reset-wc-shipstation-auth-key' ), $get_auth_key );
		}
		return $message;
	}
} else {

	/**
	 * WooCommerce ShipStation fallback notice.
	 */
	function ap_admin_notice() {
		?>
		<div class="error">
		<p>
			<?php
			esc_html_e( 'Reset Shipstation Authentication Key extension requires WooCommerce ShipStation Integration Key to be installed and active.', 'reset-wc-shipstation-auth-key' );
			?>
		</p>
		</div>
		<?php
	}
	add_action( 'admin_notices', 'ap_admin_notice' );
}
