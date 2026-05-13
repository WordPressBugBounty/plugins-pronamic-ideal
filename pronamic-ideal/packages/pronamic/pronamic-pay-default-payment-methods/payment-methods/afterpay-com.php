<?php
/**
 * Payment method.
 *
 * @package Pronamic\PronamicPayDefaultPaymentMethods
 */

declare(strict_types=1);

$image_service = new \Pronamic\WpPayLogos\ImageService();

$payment_method = new \Pronamic\WordPress\Pay\Core\PaymentMethod( \Pronamic\WordPress\Pay\Core\PaymentMethods::AFTERPAY_COM );

$payment_method->descriptions = [
	'default' => \__( 'Afterpay is a popular buy now, pay later service in Australia, New Zealand, the United States, and Canada.', 'pronamic-ideal' ),
];

$payment_method->images = [
	'woocommerce' => $image_service->get_path( 'methods/afterpay-com/method-afterpay-com-wc-51x32.svg' ),
];

return $payment_method;
