# Reset WC Shipstation Authentication Key

*This plugin is not extensively tested. Try on a dev/staging site before testing on a live site.*

Removes the active authentication key so that WooCommerce Shipstation integration extension can generate a new key. Only use this if you're having trouble deleting `woocommerce_shipstation_auth_key` option from `wp-admin/options.php`

## Usage:

* Install and Activate this plugin
* Find the `Reset ShipStation Authentication Key` tool under *WooCommerce > Tools* (or *WooCommerce > Status > Tools*):
    screenshot.png<img width="2541" alt="screenshot" src="https://user-images.githubusercontent.com/17475174/121876122-d1f6dd00-cd26-11eb-8adf-5d9886248a17.png">
* Click `Delete Key` on the right
* Find the new key under *WooCommerce > Settings > Integration > ShipStation* 
* Access your ShipStation Account > Settings > Selling Channels > Edit the linked WooCommerce Site
* Replace the empty `Authentication Key` field for the store with the newly generated key.
* Import the orders manually on your Shipstaion account:

    ![image](https://user-images.githubusercontent.com/17475174/123909839-38226780-d997-11eb-8785-660844262cf8.png)

* Confirm that you can see all the orders on your ShipStation account now
* Delete the plugin once you’ve successfully followed the steps above, and wait for the next sync to go through automatically.


**P.S: If you reset the authentication key, but don't update the new key in ShipStation account, the integration between your store and ShipStation account will break.**
