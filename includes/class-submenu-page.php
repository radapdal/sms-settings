<?php
/**
 * Creates the submenu page for the plugin.
 *
 * @package Custom_Admin_Settings
 */

/**
 * Creates the submenu page for the plugin.
 *
 * Provides the functionality necessary for rendering the page corresponding
 * to the submenu with which this page is associated.
 *
 * @package Custom_Admin_Settings
 */
class Submenu_Page {

    /**
     * A reference to the class for retrieving our option values.
     *
     * @access private
     * @var    Deserializer
     */
    private $deserializer;

    /**
     * Initializes the class by setting a reference to the incoming deserializer.
     *
     * @param Deserializer $deserializer Retrieves a value from the database.
     */
    public function __construct( $deserializer ) {
        $this->deserializer = $deserializer;
    }

    /**
     * This function renders the contents of the page associated with the Submenu
     * that invokes the render method. In the context of this plugin, this is the
     * Submenu class.
     */
    public function render() {
        include_once( 'views/settings.php' );

        add_action( 'admin_notices', $this->sms_settings_notice() );
    }

    /**
     * This function creates the admin notices after a user submits the form
     * and gets the update status from the URL
     */
    public function sms_settings_notice() {

        if ( isset( $_GET['update-status'] ) ) {

            if ( $_GET['update-status'] === 'success' ) : ?>

                <div class="notice notice-success is-dismissible">
                    <p><?php _e('Settings saved.', 'sms-settings-domain'); ?></p>
                </div>

            <?php else: ?>

                <div class="notice notice-error is-dismissible">
					<p><?php _e('Error in savng.', 'sms-settings-domain'); ?></p>
				</div>

            <?php endif;

        }

    }
}
