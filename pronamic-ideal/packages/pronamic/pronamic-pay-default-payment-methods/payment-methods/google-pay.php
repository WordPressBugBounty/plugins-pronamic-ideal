<?php
/**
 * Payment method.
 *
 * @package Pronamic\PronamicPayDefaultPaymentMethods
 */

declare(strict_types=1);

$image_service = new \Pronamic\WpPayLogos\ImageService();

$payment_method = new \Pronamic\WordPress\Pay\Core\PaymentMethod( \Pronamic\WordPress\Pay\Core\PaymentMethods::GOOGLE_PAY );

$payment_method->images = [
	'woocommerce' => $image_service->get_path( 'methods/google-pay/method-google-pay-wc-51x32.svg' ),
];

return $payment_method;
