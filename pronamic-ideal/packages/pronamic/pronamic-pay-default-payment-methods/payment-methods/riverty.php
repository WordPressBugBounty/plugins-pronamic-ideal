<?php
/**
 * Payment method.
 *
 * @package Pronamic\PronamicPayDefaultPaymentMethods
 */

declare(strict_types=1);

$image_service = new \Pronamic\WpPayLogos\ImageService();

$payment_method = new \Pronamic\WordPress\Pay\Core\PaymentMethod( \Pronamic\WordPress\Pay\Core\PaymentMethods::RIVERTY );

$payment_method->descriptions = [
	'default'  => \__( 'Riverty (formerly AfterPay) is a payment service that allows customers to pay after receiving the product.', 'pronamic-ideal' ),
	/* translators: %s: payment method name */
	'customer' => \sprintf( \__( 'You must be at least 18+ to use this service. If you pay on time, you will avoid additional costs and ensure that you can use %s services again in the future. By continuing, you accept the Terms and Conditions and confirm that you have read the Privacy Statement and Cookie Statement.', 'pronamic-ideal' ), $payment_method->name ),
];

$payment_method->images = [
	'woocommerce' => $image_service->get_path( 'methods/riverty/method-riverty-wc-51x32.svg' ),
];

return $payment_method;
