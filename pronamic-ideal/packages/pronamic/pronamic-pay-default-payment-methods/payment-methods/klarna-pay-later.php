<?php
/**
 * Payment method.
 *
 * @package Pronamic\PronamicPayDefaultPaymentMethods
 */

declare(strict_types=1);

$image_service = new \Pronamic\WpPayLogos\ImageService();

$payment_method = new \Pronamic\WordPress\Pay\Core\PaymentMethod( \Pronamic\WordPress\Pay\Core\PaymentMethods::KLARNA_PAY_LATER );

$payment_method->images = [
	'woocommerce' => $image_service->get_path( 'methods/klarna-pay-later/method-klarna-pay-later-wc-51x32.svg' ),
];

$payment_method->descriptions = [
	/* translators: %s: payment method name */
	'customer' => \sprintf( \__( 'You must be at least 18+ to use this service. If you pay on time, you will avoid additional costs and ensure that you can use %s services again in the future. By continuing, you accept the Terms and Conditions and confirm that you have read the Privacy Statement and Cookie Statement.', 'pronamic-ideal' ), $payment_method->name ),
];

return $payment_method;
