<?php
/**
 * Payment method.
 *
 * @package Pronamic\PronamicPayDefaultPaymentMethods
 */

declare(strict_types=1);

$image_service = new \Pronamic\WpPayLogos\ImageService();

$payment_method = new \Pronamic\WordPress\Pay\Core\PaymentMethod( \Pronamic\WordPress\Pay\Core\PaymentMethods::AFTERPAY_NL );

$payment_method->descriptions = [
	'default' => \__( 'AfterPay is one of the largest and most popular post-payment system in the Benelux. Millions of Dutch and Belgians use AfterPay to pay for products.', 'pronamic-ideal' ),
];

$payment_method->images = [
	'woocommerce' => $image_service->get_path( 'methods/afterpay-nl/method-afterpay-nl-wc-51x32.svg' ),
];

return $payment_method;
