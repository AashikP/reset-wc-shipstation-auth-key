# Reset WC Shipstation Authentication Key

*This plugin is not extensively tested. Try on a dev/staging site before testing on a live site.*

Removes the active authentication key so that WooCommerce Shipstation integration extension can generate a new key. Only use this if you're having trouble deleting `woocommerce_shipstation_auth_key` option from `wp-admin/options.php`

## Usage:

* Install and Activate this plugin
* Find the `Reset ShipStation Authentication Key` tool under *WooCommerce > Tools* (or *WooCommerce > Status > Tools*)
* Click `Delete Key` on the right
* Find the new key under *WooCommerce > Settings > Integration > ShipStation* 
* Access your ShipStation Account > Settings > Selling Channels > Edit the linked WooCommerce Site
* Replace the empty `Authentication Key` field for the store with the newly generated key.
* Delete the plugin once you've successfully reset the key.

