<?php
/**
 * Pointer Forms
 *
 * @author    Pronamic <info@pronamic.eu>
 * @copyright 2005-2024 Pronamic
 * @license   GPL-3.0-or-later
 * @package   Pronamic\WordPress\Pay
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<h3><?php esc_html_e( 'Payment Forms', 'pronamic-ideal' ); ?></h3>

<p>
	<?php esc_html_e( 'On the payment forms page you can add, edit or delete simple payment forms.', 'pronamic-ideal' ); ?>
	<?php esc_html_e( 'Currently it’s not possible to adjust the form fields or styling of these forms.', 'pronamic-ideal' ); ?>
	<?php

	echo wp_kses(
		sprintf(
			/* translators: 1: Gravity Forms link, 2: _blank */
			__( 'For more advanced payment forms we advice you to use the <a href="%1$s" target="%2$s">“Gravity Forms” plugin</a>.', 'pronamic-ideal' ),
			esc_attr( 'https://www.pronamic.nl/go/gravity-forms/' ),
			esc_attr( '_blank' )
		),
		[
			'a' => [
				'href'   => true,
				'target' => true,
			],
		]
	);

	?>
</p>
