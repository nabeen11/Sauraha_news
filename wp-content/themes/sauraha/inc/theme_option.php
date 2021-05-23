<?php
/**
 * Create A Simple Theme Options Panel
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Theme_Options' ) ) {

	class WPEX_Theme_Options {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'Theme Settings', 'text-domain' ),
				esc_html__( 'Theme Settings', 'text-domain' ),
				'manage_options',
				'theme-settings',
				array( 'WPEX_Theme_Options', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// Input
				if ( ! empty( $options['address'] ) ) {
					$options['address'] = sanitize_text_field( $options['address'] );
				} else {
					unset( $options['address'] ); // Remove from options if empty
				}

                if ( ! empty( $options['telephone'] ) ) {
					$options['telephone'] = sanitize_text_field( $options['telephone'] );
				} else {
					unset( $options['telephone'] ); // Remove from options if empty
				}
                if ( ! empty( $options['fax'] ) ) {
					$options['fax'] = sanitize_text_field( $options['fax'] );
				} else {
					unset( $options['fax'] ); // Remove from options if empty
				}

                if ( ! empty( $options['email'] ) ) {
					$options['email'] = sanitize_text_field( $options['email'] );
				} else {
					unset( $options['email'] ); // Remove from options if empty
				}

                if ( ! empty( $options['youtube'] ) ) {
					$options['youtube'] = sanitize_text_field( $options['youtube'] );
				} else {
					unset( $options['youtube'] ); // Remove from options if empty
				}
				if ( ! empty( $options['facebook'] ) ) {
					$options['facebook'] = sanitize_text_field( $options['facebook'] );
				} else {
					unset( $options['facebook'] ); // Remove from options if empty
				}
				if ( ! empty( $options['twitter'] ) ) {
					$options['twitter'] = sanitize_text_field( $options['twitter'] );
				} else {
					unset( $options['twitter'] ); // Remove from options if empty
				}

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">

				<h1><?php esc_html_e( 'Theme Options', 'text-domain' ); ?></h1>

				<form method="post" action="options.php">

					<?php settings_fields( 'theme_options' ); ?>

					<table class="form-table wpex-custom-admin-login-table">

						<?php // Text input example ?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Address', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'address' ); ?>
								<input type="text" name="theme_options[address]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
                        <tr valign="top">
							<th scope="row"><?php esc_html_e( 'Telephone', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'telephone' ); ?>
								<input type="text" name="theme_options[telephone]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
                        <tr valign="top">
							<th scope="row"><?php esc_html_e( 'Fax', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'fax' ); ?>
								<input type="text" name="theme_options[fax]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
                        <tr valign="top">
							<th scope="row"><?php esc_html_e( 'Email', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'email' ); ?>
								<input type="text" name="theme_options[email]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
                        <tr valign="top">
							<th scope="row"><?php esc_html_e( 'Youtube', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'youtube' ); ?>
								<input type="text" name="theme_options[youtube]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
						
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Facebook', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'facebook' ); ?>
								<input type="text" name="theme_options[facebook]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Twitter', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'twitter' ); ?>
								<input type="text" name="theme_options[twitter]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
					</table>

					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
		<?php }

	}
}
new WPEX_Theme_Options();

// Helper function to use in your theme to return a theme option value
function myprefix_get_theme_option( $id = '' ) {
	return WPEX_Theme_Options::get_theme_option( $id );
}